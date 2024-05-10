function formValidate(){
    var username = document.getElementById("name").value
    var regx = /^[a-zA-Z]+(?: [a-zA-Z]+(?: [a-zA-Z]+(?: (?:bin|ibn) )*[a-zA-Z]+)*)*(?: @ [a-zA-Z]+)?$/i;
    if(regx.test(username)){
        console.log("Input is valid");
    }
    else{
        alert("Invalid Name input, please use letters and symbols like ',' or '@'");
    }
  
    var matric = document.getElementById("matricNo").value
    var regx = /^(\d{7})$/i;
    if(regx.test(matric)){
        console.log("Input is valid");
    }
    else{
        alert("Invalid input for Matric Number, required 7 digits of numbers only");
    }
  
    var email = document.getElementById("email").value
    var regx = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/i;
    if(regx.test(email)){
        console.log("Input is valid");
    }
    else{
        alert("Invalid email format. Please check the following:\n" +
    "* A valid email should only contain letters, numbers, underscores, hyphens, and periods.\n" +
    "* The email should be followed by an '@' symbol.\n" +
    "* The domain name should include at least one dot separating parts (e.g., gmail.com).\n" +
    "* The top-level domain (like .com, .org) should be at least 2 characters long.");
    }
  
    var cAddress = document.getElementById("currentAddress").value
    var regx = /^([\w\s\W]+[\w\W]?)\s([\d\-\\\/\w]*)?/i;
    if(regx.test(cAddress)){
        console.log("Input is valid");
    }
    else{
        alert("Invalid input for Current Address, please use letters (a-z, A-Z), numbers (0-9), spaces, and these symbols: -, /, ., \, @, '");
    }
  
    var hAddress = document.getElementById("homeAddress").value
    var regx = /^([\w\s\W]+[\w\W]?)\s([\d\-\\\/\w]*)?/i;
    if(regx.test(hAddress)){
        console.log("Input is valid");
    }
    else{
        alert("Invalid input for Home Address, please use letters (a-z, A-Z), numbers (0-9), spaces, and these symbols: -, /, ., \, @, '");
    }
  
    var mPhone = document.getElementById("mobilePhoneNo").value
    var regx = /^\+?[0-9]{2,}[0-9]{7,}$/i;
    if(regx.test(mPhone)){
        console.log("Input is valid");
    }
    else{
        alert("Looks like there might be an issue with your Mobile Phone number format. Please try again using digits (0-9), spaces, hyphens (-), dots (.), or parentheses ().");
    }
  
    var hPhone = document.getElementById("homePhoneNo").value
    var regx = /^\+?[0-9]{2,}[0-9]{7,}$/i;
    if(regx.test(hPhone)){
        console.log("Input is valid");
    }
    else{
        alert("Looks like there might be an issue with your Home Phone number format. Please try again using digits (0-9), spaces, hyphens (-), dots (.), or parentheses ().");
  }
  
  }
  