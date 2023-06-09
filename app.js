// js replace methods

replace(/\,/g, '')
replace(/\s/g, '')
class userInfo {
    name = "ANmol"
    age = "23"
}
const uInfo = new userInfo();
console.log(uInfo.age)

// javascript clicked button target class or anything
function update() {
    var clickedButtonEvent = event.target;
    var cardElement = clickedButtonEvent.parentNode;
    var updatePackageInput = cardElement.querySelector('.updatePackage');
    var packageValue = updatePackageInput.value.replace("000", "0,00")
    updatePackageInput.value = packageValue;
    console.log(updatePackageInput)
}