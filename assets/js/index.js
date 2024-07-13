import "./plugins/contentful-paint";

document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".swiper")) {
    import("./plugins/swiper")
      .then((module) => {
        if (module && module.initSwiper) {
          module.initSwiper();
        } else {
          console.error("initSwiper function not found in Swiper module.");
        }
      })
      .catch((err) => {
        console.error("Error loading Swiper module:", err);
      });
  } else {
    console.log("Swiper element not found.");
  }

  if (document.querySelector(".export-index")) {
    import("./plugins/export-index")
      .then((module) => {
        if (module && module.hola) {
          module.exportIndex();
        } else {
          console.error("hola function not found in export-index module.");
        }
      })
      .catch((err) => {
        console.error("Error loading Hola module:", err);
      });
  } else {
    console.log("No se exportan las funciones.");
  }

  if (document.querySelector(".addClass")) {
    import("./utils/classlist")
      .then((module) => {
        if (module && module.addClass && module.removeClass) {
          const elements = document.querySelectorAll(".color-article");

          document.getElementById("btn-naranja").addEventListener("mouseover", () => {
            module.addClass(elements, "orange");
            module.removeClass(elements, "yellow");
          });

          document.getElementById("btn-naranja").addEventListener("mouseout", () => {
            module.removeClass(elements, "orange");
          });

          document.getElementById("btn-amarillo").addEventListener("mouseover", () => {
            module.addClass(elements, "yellow");
            module.removeClass(elements, "orange");
          });

          document.getElementById("btn-amarillo").addEventListener("mouseout", () => {
            module.removeClass(elements, "yellow");
          });
        } else {
          console.error("addClass or removeClass function not found in classlist module.");
        }
      })
      .catch((err) => {
        console.error("Error loading classlist module:", err);
      });
  } else {
    console.log("No se exportan addClass()");
  }
});
