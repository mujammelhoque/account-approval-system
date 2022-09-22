
    let canvas = document.querySelector('canvas');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    canvas.style.backgroundColor = "#1DD3B0"
    let c = canvas.getContext('2d');

    let mouse = {
      x: undefined,
      y: undefined
    }

    document.addEventListener('mousemove', function(event) {
      mouse.x = event.x;
      mouse.y = event.y;
      console.log(mouse);
      createRipple();
    })

    class Circle {
      constructor(x, y, colorObject) {
        this.x = x;
        this.y = y;
        this.radius = 0;
        this.colorObject = colorObject;
      }

      draw() {
        c.beginPath();
        c.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
        c.stroke();
      }

      update() {
        if (this.radius < 20) {
          this.radius += 4;
          c.strokeStyle = `rgba(${this.colorObject.r}, ${this.colorObject.g}, ${this.colorObject.b}, 1)`
        }
        else if (this.radius < 50) {
          this.radius += 5;
          c.strokeStyle = `rgba(${this.colorObject.r}, ${this.colorObject.g}, ${this.colorObject.b}, 0.8)`
        }
        else if (this.radius < 100) {
          this.radius += 8;
          c.strokeStyle = `rgba(${this.colorObject.r}, ${this.colorObject.g}, ${this.colorObject.b}, 0.6)`
        }
        else if (this.radius < 150) {
          this.radius += 10;
          c.strokeStyle = `rgba(${this.colorObject.r}, ${this.colorObject.g}, ${this.colorObject.b}, 0.4)`
        }
        else if (this.radius < 200) {
          this.radius += 15;
          c.strokeStyle = `rgba(${this.colorObject.r}, ${this.colorObject.g}, ${this.colorObject.b}, 0.2)`
        }
        else if (this.radius < 250) {
          this.radius += 20;
          c.strokeStyle = `rgba(${this.colorObject.r}, ${this.colorObject.g}, ${this.colorObject.b}, 0.05)`
          circleArray.shift();
        }

        this.draw();
      }
    }

    let circleArray = []

    // let colorArray = [{r:8, g:99, b:117}, {r:175, g:252, b:65}, {r:178, g:255, b:158}, {r:255, g:255, b:255}]
    let colorArray = [{r:255, g:255, b:255}]

    function createRipple() {
      let colorObject = colorArray[Math.floor(Math.random()*colorArray.length)]
      circleArray.push(new Circle(mouse.x, mouse.y, colorObject))
    }

    function animate() {
      setTimeout(() => requestAnimationFrame(animate), 30);
      c.fillStyle = 'rgba(29, 211, 176, 0.5)'
      c.fillRect(0, 0, window.innerWidth, window.innerHeight);
      circleArray.forEach(circle => circle.update())
    }

    animate();
