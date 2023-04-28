
let fileInput = document.getElementById('multi-image');
let imageContainer = document.getElementById('file-viewer');
let numOfFiles = document.getElementById('num-files-chosen');

// console.log(fileInput, imageContainer, numOfFiles);

function Preview(){

   imageContainer.innerHTML = ""

   numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

   for(i of fileInput.files) {
      let reader = new FileReader();
      let figure = document.createElement("figure");
      let figCap = document.createElement("figcaption");

      figCap.innerText = i.name;
      figure.appendChild(figCap);
      reader.onload=()=>{
         let img = document.createElement("img");
         img.setAttribute("src", reader.result);
         figure.insertBefore(img, figCap);
      };

      imageContainer.appendChild(figure);
      reader.readAsDataURL(i);
   }

}