function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (RegExp('\\b'+ val.toUpperCase() +'\\b').test(arr[i].toUpperCase())) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML += arr[i];
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var institutes = ['DHA Suffa University','Greenwich University','University of Karachi','National University of Computer and Emerging Sciences', 'FAST-NUCES','Sindh Madressatul Islam University','Hamdard University','NED University of Engineering and Technology','Dawood University of Engineering and Technology','Sir Syed University of Engineering and Technology','Karachi Institute of Economics and Technology','Shaheed Zulfiqar Ali Bhutto Institute of Science and Technology','National University of Computer and Emerging Sciences','Aga Khan University','Dow University of Health Sciences','Ziauddin University','Baqai Medical University','Karachi Medical and Dental College','Benazir Bhutto Shaheed University','Institute of Business Administration','Karachi School of Business and Leadership','Institute of Business Management','Virtual University of Pakistan','Nazeer Hussain University','Altamash Institute of Dental Medicine','Adamson Institute of Business Administration and Technology','Bahria University, Karachi campus','D. J. Sindh Government Science College','Federal Urdu University','Preston Institute of Management Science and Technology','Pakistan Marine Academy','Pakistan Naval Academy','Pakistan Navy Engineering College','Sindh Madrasatul Islam','Dadabhoy Institute of Higher Education','Indus University','Indus Valley School of Art and Architecture','ILMA University','Iqra University','Jinnah University for Women','KASB Institute of Technology','Mohammad Ali Jinnah University','Newports Institute of Communications & Economics','Preston University','Textile Institute of Pakistan','Habib University','Karachi Institute of Technology and Entrepreneurship','Karachi Institute of Technology and Entrepreneurship','Al-Khair University','COMMECS Institute of Business and Emerging Sciences','Dar-ul-Uloom, Amjadia','Jamia Ashraful-uloom baitul mukarram','Dar-ul-Uloom, Karachi','Fatima Jinnah Dental College','Institute of Industrial Electronics Engineering (PCSIR)','Karachi School of Art','National Institute of Management','Pakistan Institute of Management','D. J. Sindh Government Science College','Government Aisha Bawani College','Government Boys College','Government College for Boys','Government College for Men Nazimabad','Government College of Commerce & Economics','Government College of Technology','Government Country College Musa Colony','Government Degree Arts and Commerce College','Government Degree Boys College','Government Degree Boys Post Graduate College','Government Degree College','Government Degree College for Boys','Government Degree Commerce College','Government Degree Science and Commerce College','Government Degree Science College','Government Dehli Inter Science College','Government Islamia Arts and Commerce College','Government Jamia Millia Degree College','Government Khushak College for Boys','Government National College','Government PECHS Education Foundation Science College','Government Polytechnic Institute','Government Sirajudallah College','Government Superior Science College','Government Zia-uddin Memorial Nabi Bagh Inter Science College','Haji Abdullah Haroon Government College','Government Islamia Science College','Liaquat Government College','MDH College for Boys','Pakistan Shipowners College','Pakistan Swiss Training Centre','Pakistan Swedish Institute of Technology','Pakistan Switzerland Training Center','Paradise Commerce College','Premier Government College','Quaid-e-Millat Government College','S.M. Government Arts and Commerce College','S.M. Government Science College','Zam Zama Grammar School and College','Abdullah Government College for Women','Adler College For Girls','Al-Beroni Intermediate College','Al-Haq Girls College','APWA Government College for Women','Arabic Girls College For Islamic Studies','City College for Women','DHA Degree College For Women','Government College for Women','Government College of Commerce and Economics','Government Degree Girls College','Government Girls College','Government Girls Commerce and Arts College','Government Girls Science and Commerce College','Government Girls Science College','Government Islamia College for Women','Government Karachi College for Women','Government PECHS College for Women','Government SMB Fatima Jinnah Girls College','H.I. Osmania Government College for Women','Hayat-ul-Islam Girls Degree College','HRH Agha Khan Government Girls College','Institute Of Montessori Education','Khatoon-e-Pakistan Government College for Women','Khatoon-e-Pakistan Government Degree College','Khurshid Government College for Women','Liaquat Government College for Girls Malir','Metropolis College for Girls','Model College for Girls Karachi','Nishter Government Girls College','Pakistan Polytechnic Center','Premier Government College for Girls','Rana Liaquat Ali Khan Government College of Home Economics','Raunaq-e-Islam Government College for Women','Riaz Government Girls College','Shaheed-e-Millat Government Degree Girls','Sir Syed Government Girls College','St. Lawrence Government Girls College','Federal Government College','Federal Government Inter Girls College','Aga Khan Higher Secondary School','College of Accounting and Management Sciences','Commecs College','Crescent Bahria Cadet College','Defence Authority Degree College for Boys & Girls','Dehli Science and Commerce College','Dewa College of Information Technology and Science','DOW Medical College','Guards Public College','Hamdard College of Science and Commerce','Institute of Business Education','Jinnah Sindh Medical College','Karachi Medical and Dental College','Laury Thrillmens College','Learning Center','Liaquat College of Medicine and Dentistry','Meritorious Science College','NCR-CET','New Century College','Newports Institute of Communications and Economics','Pak Swiss Training Center','Pakistan Educational Foundation College','Pakistan Steel Cadet College','Sindh Muslim Law College','SSAT Degree College','St. Joseph College','St. Patricks Science College','St. Petersburgs High College','USAID – Naye Roshni', 'Army Public College','Nixor College','Fazia Degree College','Fazaia Inter College','Saleem Nawaz Fazaia College','Bahria College Karsaz','Bahria College NORE-I','Bahria Foundation College'];
