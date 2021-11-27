console.log("formCounter.js loaded successfully.")
function setCounter(max, formId, destinationId){
    console.log(document.getElementById(destinationId).innerHTML);
    let content = document.getElementById(formId).value;
    console.log(content);
    let contentLength = content.length;
    console.log(contentLength);
    let counter = contentLength + "/" + max;
    console.log(counter);
    document.getElementById(destinationId).innerHTML = counter;
}