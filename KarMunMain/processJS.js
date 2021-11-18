



function startTimer(duration, display) {
    var timer = duration,
        minutes, seconds;
    setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

function changeSidenavColor() {
    var anchor = document.getElementById('ANCHOR');
    var anchorHeightHeight = anchor.getBoundingClientRect().y;
    var pageHeight = document.getElementById('newsflash').offsetHeight;
    var sidenavItemsElements = [document.getElementById('newsflashNav'),
        document.getElementById('countryMatrixNav'),
        document.getElementById('commsNav'),
        document.getElementById('moneyTransferNav'),
        document.getElementById('warNav')
    ];

    var sidenavItems = [document.getElementById('newsflash').getBoundingClientRect().y,
        document.getElementById('countryMatrix').getBoundingClientRect().y,
        document.getElementById('comms').getBoundingClientRect().y,
        document.getElementById("moneyTransfer").getBoundingClientRect().y
    ];

    var sidenavItemsHeights = [document.getElementById('newsflash').offsetHeight,
        document.getElementById('countryMatrix').offsetHeight,
        document.getElementById('comms').offsetHeight,
        document.getElementById('moneyTransfer').offsetHeight
    ];


    for (var i = 0; i < sidenavItems.length; i++) {
        if (sidenavItems[i] + pageHeight > anchorHeightHeight && sidenavItems[i] + sidenavItemsHeights[i] < anchorHeightHeight + pageHeight) {
            sidenavItemsElements[i].classList.add("anchorActive");
        } else {
            if (sidenavItemsElements[i].classList.contains("anchorActive")) {
                sidenavItemsElements[i].classList.remove("anchorActive");
            }
        }

    }
    var anchor = document.getElementById('ANCHOR');
    var anchorHeightHeight = anchor.getBoundingClientRect().y;
    var pageHeight = document.getElementById('quantumPage').offsetHeight;
    var sidenavWarItemsElements = [document.getElementById('quantumNav'),
        document.getElementById('armamentNav'),
        document.getElementById('cyberNav'),
        document.getElementById('allianceNav')
    ];

    var sidenavWarItems = [document.getElementById('quantumPage').getBoundingClientRect().y,
        document.getElementById('armamentPage').getBoundingClientRect().y,
        document.getElementById('cyberPage').getBoundingClientRect().y,
        document.getElementById("alliancePage").getBoundingClientRect().y
    ];

    var sidenavWarItemsHeights = [document.getElementById('quantumPage').offsetHeight,
        document.getElementById('armamentPage').offsetHeight,
        document.getElementById('cyberPage').offsetHeight,
        document.getElementById('alliancePage').offsetHeight
    ];


    for (var i = 0; i < sidenavWarItems.length; i++) {
        if (sidenavWarItems[i] + pageHeight > anchorHeightHeight && sidenavWarItems[i] + sidenavWarItemsHeights[i] < anchorHeightHeight + pageHeight) {
            sidenavWarItemsElements[i].classList.add("anchorActive");
        } else {
            if (sidenavWarItemsElements[i].classList.contains("anchorActive")) {
                sidenavWarItemsElements[i].classList.remove("anchorActive");
            }
        }

    }

}

function changeWarSidenavColor() {
    var anchor = document.getElementById('ANCHOR');
    var anchorHeightHeight = anchor.getBoundingClientRect().y;
    var pageHeight = document.getElementById('newsflash').offsetHeight;
    var sidenavWarItemsElements = [document.getElementById('quantumNav'),
        document.getElementById('armamentNav'),
        document.getElementById('cyberNav'),
        document.getElementById('allianceNav')
    ];

    var sidenavWarItems = [document.getElementById('quantumPage').getBoundingClientRect().y,
        document.getElementById('armamentPage').getBoundingClientRect().y,
        document.getElementById('cyberPage').getBoundingClientRect().y,
        document.getElementById("alliancePage").getBoundingClientRect().y
    ];

    var sidenavWarItemsHeights = [document.getElementById('quantumPage').offsetHeight,
        document.getElementById('armamentPage').offsetHeight,
        document.getElementById('cyberPage').offsetHeight,
        document.getElementById('alliancePage').offsetHeight
    ];


    for (var i = 0; i < sidenavWarItems.length; i++) {
        if (sidenavWarItems[i] + pageHeight > anchorHeightHeight && sidenavWarItems[i] + sidenavWarItemsHeights[i] < anchorHeightHeight + pageHeight) {
            sidenavWarItemsElements[i].classList.add("anchorActive");
        } else {
            if (sidenavWarItemsElements[i].classList.contains("anchorActive")) {
                sidenavWarItemsElements[i].classList.remove("anchorActive");
            }
        }

    }

} //change sidenav color

var modal = document.getElementById("newsflashModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
} //newsflash modal

function toggleProcess() { //when war is to be displayed
    var processTb = document.getElementById("processTb");
    var warTb = document.getElementById("warTb");
    var processNav = document.getElementById("mySidenav");
    var warNavbar = document.getElementById("warNavbar");

    document.getElementById("welcomeTitle").style.color = "red";
    document.getElementById("transbox").style.borderTopColor = "red";

    warTb.hidden = false;
    warNavbar.hidden = false;
    processTb.hidden = true;
    processNav.hidden = true;
}

function toggleWar() { //when process is to be displayed
    var processTb = document.getElementById("processTb");
    var warTb = document.getElementById("warTb");
    var processNav = document.getElementById("mySidenav");
    var warNavbar = document.getElementById("warNavbar");

    document.getElementById("welcomeTitle").style.color = "#24d9ff";
    document.getElementById("transbox").style.borderTopColor = "#24d9ff";

    warTb.hidden = true;
    warNavbar.hidden = true;
    processTb.hidden = false;
    processNav.hidden = false;
} //toggle process and war		

$(document).ready(function() {
    function getData() {
        $.ajax({
            type: 'POST',
            url: 'soldier_ref.php',
            success: function(data) {
                $('#output').html(data);
            }
        });
    }
    getData();
    setInterval(function() {
        getData();
    }, 1000); // it will refresh your data every 1 sec

});

$(document).ready(function() {
    function getData() {
        $.ajax({
            type: 'POST',
            url: 'tank_ref.php',
            success: function(data) {
                $('#output3').html(data);
            }
        });
    }
    getData();
    setInterval(function() {
        getData();
    }, 1000); // it will refresh your data every 1 sec

});

$(document).ready(function() {
    function getData() {
        $.ajax({
            type: 'POST',
            url: 'ship_ref.php',
            success: function(data) {
                $('#output4').html(data);
            }
        });
    }
    getData();
    setInterval(function() {
        getData();
    }, 1000); // it will refresh your data every 1 sec

});

$(document).ready(function() {
    function getData() {
        $.ajax({
            type: 'POST',
            url: 'plane_ref.php',
            success: function(data) {
                $('#output2').html(data);
            }
        });
    }
    getData();
    setInterval(function() {
        getData();
    }, 1000); // it will refresh your data every 1 sec

});
