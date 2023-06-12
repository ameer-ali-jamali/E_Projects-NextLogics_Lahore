// js replace methods

// ignore (,) coma from string
replace(/\,/g, '')

// ignore any space from string
replace(/\s/g, '')

// es13 class method
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

// jquery use multiple events on click
// $('.text_package_input').on('click mouseleave', calculatePrice);


// toLocalString function helps to convert numbers to like a calculator results
let calculation = getSmsRate * getPackage;
var getPrice = price.val(calculation.toFixed(2).replace(/\.?0+$/, ''));
var result = parseInt(getPrice.val());
var formattedResult = result.toLocaleString();
price.val(formattedResult)