
require('./bootstrap');

require('alpinejs');

import flatpckr from 'flatpickr';
window.flatpckr = flatpckr;


var buttonswitch = document.getElementsByClassName('switch-button');
var card = document.getElementsByClassName('.auth-card');

if( buttonswitch.length > 0 ){
    console.log('connected');
    document.querySelector('.switch-button').addEventListener('click', () => {
    
        var register, login, button;
         
        button = document.querySelector('.switch-button');    
        register = document.querySelector('#register_form');
        login = document.querySelector('#login_form');
        
        
        if(register.classList.contains('hide')) {
            card.style = 'min-height: 600px;'
            login.classList.remove('show');
            login.classList.add('hide');
            register.classList.remove('hide');
            register.classList.add('show');
            button.innerHTML= 'Login';
           

        } else if (login.classList.contains('hide')) {
            card.style = 'min-height: 370px;'
            register.classList.remove('show');
            register.classList.add('hide');
            login.classList.remove('hide');
            login.classList.add('show');
            button.innerHTML = 'Register';
            
        }
    });
}

//---------- Reservation Calendar --------------

// Disabled Saturday and Sunday
flatpickr("#pickdate", {
    altInput: true,
    altFormat: "D, F j, Y",
    dateFormat: "D, F j, Y",
    monthSelectorType: "dropdown",
    "disable": [
      function(date) {
          // return true to disable
          return (date.getDay() === 0 || date.getDay() === 6);

      }
    ],
    "locale": {
        "firstDayOfWeek": 1 // start week on Monday
    }
});
// Disabled Sunday
flatpickr("#pickdate1", {
    altInput: true,
    altFormat: "D, F j, Y",
    dateFormat: "D, F j, Y",
    monthSelectorType: "dropdown",
    "disable": [
      function(date) {
          // return true to disable
          return date.getDay() === 0;

      }
    ],
    "locale": {
        "firstDayOfWeek": 1 // start week on Monday
    }
});

// Time

flatpickr("#picktime15", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    minuteIncrement: "15",
    minTime: "09:00",
    maxTime: "21:00",    
});
flatpickr("#picktime30", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    minuteIncrement: "60",
    minTime: "09:00",
    maxTime: "21:00",
});
flatpickr("#picktime60", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    minuteIncrement: "60",
    minTime: "09:00",
    maxTime: "21:00",
});

// END Reservation Calendar









   
// Google maps
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

// window.initAutocomplete = function() {
//     const map = new google.maps.Map(document.getElementById("map"), {
//       center: { lat: 40.63226, lng: 22.94585 },
//       zoom: 13,
//       mapTypeId: "roadmap",
//     });
//     // Create the search box and link it to the UI element.
//     const input = document.getElementById("pac-input");
//     const searchBox = new google.maps.places.SearchBox(input);
//     map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
//     // Bias the SearchBox results towards current map's viewport.
//     map.addListener("bounds_changed", () => {
//       searchBox.setBounds(map.getBounds());
//     });
//     let markers = [];
//     // Listen for the event fired when the user selects a prediction and retrieve
//     // more details for that place.
//     searchBox.addListener("places_changed", () => {
//       const places = searchBox.getPlaces();
  
//       if (places.length == 0) {
//         return;
//       }
//       // Clear out the old markers.
//       markers.forEach((marker) => {
//         marker.setMap(null);
//       });
//       markers = [];
//       // For each place, get the icon, name and location.
//       const bounds = new google.maps.LatLngBounds();
//       places.forEach((place) => {
//         if (!place.geometry || !place.geometry.location) {
//           console.log("Returned place contains no geometry");
//           return;
//         }
//         const icon = {
//           url: place.icon,
//           size: new google.maps.Size(71, 71),
//           origin: new google.maps.Point(0, 0),
//           anchor: new google.maps.Point(17, 34),
//           scaledSize: new google.maps.Size(25, 25),
//         };
//         // Create a marker for each place.
//         markers.push(
//           new google.maps.Marker({
//             map,
//             icon,
//             title: place.name,
//             position: place.geometry.location,
//           })
//         );
  
//         if (place.geometry.viewport) {
//           // Only geocodes have viewport.
//           bounds.union(place.geometry.viewport);
//         } else {
//           bounds.extend(place.geometry.location);
//         }
//       });
//       map.fitBounds(bounds);
//     });
//   }
// Full screen confetti
// confetti.start(9550);


if( document.querySelectorAll('.confeti').length > 0 ){
        // ammount to add on each button press
        const confettiCount = 100
        const sequinCount = 10
        // "physics" variables
        const gravityConfetti = 0.3
        const gravitySequins = 0.55
        const dragConfetti = 0.075 
        const dragSequins = 0.02
        const terminalVelocity = 3
        
        // init other global elements
        const button = document.getElementById('button')
        var disabled = false
        const canvas = document.getElementById('canvas')
        const ctx = canvas.getContext('2d')
        canvas.width = window.innerWidth
        canvas.height = window.innerHeight
        let cx = ctx.canvas.width / 2
        let cy = ctx.canvas.height / 2
        
        // add Confetto/Sequin objects to arrays to draw them
        let confetti = []
        let sequins = []
        
        // colors, back side is darker for confetti flipping
        const colors = [
          { front : '#53d8d8', back: '#53d8d8' }, // Light Blue
          { front : '#f99757', back: '#f99757' }, // Orange
          { front : '#5c86ff', back: '#345dd1' }  // Darker Blue
        ]
        
        // helper function to pick a random number within a range
        const randomRange = (min, max) => Math.random() * (max - min) + min;
        
        // helper function to get initial velocities for confetti
        // this weighted spread helps the confetti look more realistic
        const initConfettoVelocity = (xRange, yRange) => {
          const x = randomRange(xRange[0], xRange[1])
          const range = yRange[1] - yRange[0] + 1
          let y = yRange[1] - Math.abs(randomRange(0, range) + randomRange(0, range) - range)
          if (y >= yRange[1] - 1) {
            // Occasional confetto goes higher than the max
            y += (Math.random() < .25) ? randomRange(1, 3) : 0
          }
          return {x: x, y: -y}
        }
        
        // Confetto Class
        function Confetto() {
          this.randomModifier = randomRange(0, 99)
          this.color = colors[Math.floor(randomRange(0, colors.length))]
          this.dimensions = {
            x: randomRange(5, 9),
            y: randomRange(8, 15),
          }
          this.position = {
            x: randomRange(canvas.width/2 - button.offsetWidth/4, canvas.width/2 + button.offsetWidth/4),
            y: randomRange(canvas.height/2 + button.offsetHeight/2 + 8, canvas.height/2 + (1.5 * button.offsetHeight) - 8),
          }
          this.rotation = randomRange(0, 2 * Math.PI)
          this.scale = {
            x: 1,
            y: 1,
          }
          this.velocity = initConfettoVelocity([-9, 9], [6, 11])
        }
        Confetto.prototype.update = function() {
          // apply forces to velocity
          this.velocity.x -= this.velocity.x * dragConfetti
          this.velocity.y = Math.min(this.velocity.y + gravityConfetti, terminalVelocity)
          this.velocity.x += Math.random() > 0.5 ? Math.random() : -Math.random()
          
          // set position
          this.position.x += this.velocity.x
          this.position.y += this.velocity.y
        
          // spin confetto by scaling y and set the color, .09 just slows cosine frequency
          this.scale.y = Math.cos((this.position.y + this.randomModifier) * 0.09)    
        }
        
        // Sequin Class
        function Sequin() {
          this.color = colors[Math.floor(randomRange(0, colors.length))].back,
          this.radius = randomRange(1, 2),
          this.position = {
            x: randomRange(canvas.width/2 - button.offsetWidth/3, canvas.width/2 + button.offsetWidth/3),
            y: randomRange(canvas.height/2 + button.offsetHeight/2 + 8, canvas.height/2 + (1.5 * button.offsetHeight) - 8),
          },
          this.velocity = {
            x: randomRange(-6, 6),
            y: randomRange(-8, -12)
          }
        }
        Sequin.prototype.update = function() {
          // apply forces to velocity
          this.velocity.x -= this.velocity.x * dragSequins
          this.velocity.y = this.velocity.y + gravitySequins
          
          // set position
          this.position.x += this.velocity.x
          this.position.y += this.velocity.y   
        }
        
        // add elements to arrays to be drawn
        const initBurst = () => {
          for (let i = 0; i < confettiCount; i++) {
            confetti.push(new Confetto())
          }
          for (let i = 0; i < sequinCount; i++) {
            sequins.push(new Sequin())
          }
        }
        
        // draws the elements on the canvas
        const render = () => {
          ctx.clearRect(0, 0, canvas.width, canvas.height)
          
          confetti.forEach((confetto, index) => {
            let width = (confetto.dimensions.x * confetto.scale.x)
            let height = (confetto.dimensions.y * confetto.scale.y)
            
            // move canvas to position and rotate
            ctx.translate(confetto.position.x, confetto.position.y)
            ctx.rotate(confetto.rotation)
        
            // update confetto "physics" values
            confetto.update()
            
            // get front or back fill color
            ctx.fillStyle = confetto.scale.y > 0 ? confetto.color.front : confetto.color.back
            
            // draw confetto
            ctx.fillRect(-width / 2, -height / 2, width, height)
            
            // reset transform matrix
            ctx.setTransform(1, 0, 0, 1, 0, 0)
        
            // clear rectangle where button cuts off
            if (confetto.velocity.y < 0) {
              ctx.clearRect(canvas.width/2 - button.offsetWidth/2, canvas.height/2 + button.offsetHeight/2, button.offsetWidth, button.offsetHeight)
            }
          })
        
          sequins.forEach((sequin, index) => {  
            // move canvas to position
            ctx.translate(sequin.position.x, sequin.position.y)
            
            // update sequin "physics" values
            sequin.update()
            
            // set the color
            ctx.fillStyle = sequin.color
            
            // draw sequin
            ctx.beginPath()
            ctx.arc(0, 0, sequin.radius, 0, 2 * Math.PI)
            ctx.fill()
        
            // reset transform matrix
            ctx.setTransform(1, 0, 0, 1, 0, 0)
        
            // clear rectangle where button cuts off
            if (sequin.velocity.y < 0) {
              ctx.clearRect(canvas.width/2 - button.offsetWidth/2, canvas.height/2 + button.offsetHeight/2, button.offsetWidth, button.offsetHeight)
            }
          })
        
          // remove confetti and sequins that fall off the screen
          // must be done in seperate loops to avoid noticeable flickering
          confetti.forEach((confetto, index) => {
            if (confetto.position.y >= canvas.height) confetti.splice(index, 1)
          })
          sequins.forEach((sequin, index) => {
            if (sequin.position.y >= canvas.height) sequins.splice(index, 1)
          })
        
          window.requestAnimationFrame(render)
        }
        
        // cycle through button states when clicked
        window.clickButton = () => {
          if (!disabled) {
            disabled = true
            // Loading stage
            button.classList.add('loading')
            button.classList.remove('ready')
            setTimeout(() => {
              // Completed stage
              button.classList.add('complete')
              button.classList.remove('loading')
              setTimeout(() => {
                initBurst()
                setTimeout(() => {
                  // Reset button so user can select it again
                  disabled = false
                  button.classList.add('ready')
                  button.classList.remove('complete')
                }, 0)
              }, 0)
            }, 0)
          }
        }
        
        // re-init canvas if the window size changes
        const resizeCanvas = () => {
          canvas.width = window.innerWidth
          canvas.height = window.innerHeight
          cx = ctx.canvas.width / 2
          cy = ctx.canvas.height / 2
        }
        
        // resize listenter
        window.addEventListener('resize', () => {
          resizeCanvas()
        })
        
        // Set up button text transition timings on page load
        const textElements = button.querySelectorAll('.button-text')
        textElements.forEach((element) => {
        const characters = element.innerText.split('')
          let characterHTML = ''
          characters.forEach((letter, index) => {
            characterHTML += `<span class="char${index}" style="--d:${index * 30}ms; --dr:${(characters.length - index - 1) * 30}ms;">${letter}</span>`
          })
          element.innerHTML = characterHTML
        })
        render()
    }


// Tabs
window.initAutocomplete = function() {
  let tabsContainer = document.querySelector("#tabs");

  let tabTogglers = tabsContainer.querySelectorAll("a");
  console.log(tabTogglers);

  tabTogglers.forEach(function(toggler) {
    toggler.addEventListener("click", function(e) {
      e.preventDefault();

      let tabName = this.getAttribute("href");

      let tabContents = document.querySelector("#tab-contents");

      for (let i = 0; i < tabContents.children.length; i++) {

        tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
        if ("#" + tabContents.children[i].id === tabName) {
          continue;
        }
        tabContents.children[i].classList.add("hidden");

      }
      e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
    });
  });

  document.getElementById("default-tab").click();
}()

// END Tabs