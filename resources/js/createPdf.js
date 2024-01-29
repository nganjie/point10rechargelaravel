export function generateurPDF(piecejointe,nom_fichier){
    const piece = document.querySelector(piecejointe);
 //piece.style.width="600px";
 //piece.style.height="900px";
 var opt = {
    filename:     nom_fichier,
    html2canvas:  { scale: 2 },
    jsPDF:        { unit: 'pc', format: 'a4', orientation: 'p' }
  };
  const options = {
    // La largeur et la hauteur du PDF
    width: 658,
    height: 658,

    // La marge gauche, droite, supérieure et inférieure
    marginLeft: 20,
    marginRight: 20,
    marginTop: 20,
    marginBottom: 20,

    // L'orientation du PDF (portrait ou paysage)
    orientation: 'portrait',
    filename:     nom_fichier
  };
  setTimeout(()=>{
      html2pdf()
      .set(opt)
      .from(piece)
      .save();



  },600);
console.log(piece);
 /*   html2pdf()
    .from(piece)
    .save();*/
}