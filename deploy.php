<?php
namespace Deployer;
use Symfony\Component\Console\Input\InputOption;

require 'recipe/laravel.php';

// Project name
set('application', 'intern_dev1');

// Project repository
set('repository', 'git@github.com:dreadnought-inc/intern_dev1.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// copy env file
option('env-update', null, InputOption::VALUE_OPTIONAL, 'update env file.');
task('copy:env', function () {
  $stage = "staging";
  $src = ".env.${stage}";
  $path = get('deploy_path');
  $shared_path = "${path}/shared";
  run("if [ -e $(echo ${shared_path}/.env ) ]; then cp {{release_path}}/${src} ${shared_path}/.env; fi");
  run("cp {{release_path}}/${src} {{release_path}}/.env");
});
before('deploy:shared','copy:env');

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('deploy.nova-tech.work')
    ->setSshArguments(['-o StrictHostKeyChecking=no'])
    ->setRemoteUser('deploy')
    ->setIdentityFile('~/.ssh/id_rsa')
    ->set('labels', ['stage' => 'staging'])
    ->set('deploy_path', '~/{{application}}');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

