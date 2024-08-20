async function loadSVG() {
  try {
    const response = await fetch("icon.svg");
    const svgText = await response.text();
    const parser = new DOMParser();
    const svgDoc = parser.parseFromString(svgText, "image/svg+xml").documentElement;

    // Agrega el atributo `fill` a los elementos SVG
    svgDoc.querySelectorAll("*").forEach((el) => el.setAttribute("fill", "currentColor"));

    document.getElementById("icon-container").appendChild(svgDoc);
  } catch (error) {
    console.error("Error cargando el SVG:", error);
  }
}

loadSVG();
