window.onload = function(){
    document.getElementById('add-existing-user').innerHTML = php_vars.internalHeader
    document.getElementById('add-existing-user').nextElementSibling.innerHTML = php_vars.internal;
    document.getElementById('create-new-user').innerHTML = php_vars.externalHeader
    document.getElementById('create-new-user').nextElementSibling.innerHTML = php_vars.external;
}
