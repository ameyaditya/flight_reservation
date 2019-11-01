var doc = new jsPDF();
// var specialElementHandlers = {
//     '#editor': function (element, renderer) {
//         return true;
//     }
// };
$('#cmd').click(function () {
    doc.fromHTML($('#ticket').html(), 15, 15, {
        'width': 170
    });
    doc.save('sample-file.pdf');
});

function download_pass(pids){
	window.open('boardingpass.php?pids='+pids, 'newwindow');
}
function print(number, quality = 5) {
		const filename  = 'test2.pdf';

		html2canvas(document.querySelector('#alltickets'), 
								{scale: quality}
						 ).then(canvas => {
			let pdf = new jsPDF('l', 'mm', [240, (80*number) + 40]);
			pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 10, 10, 240, (80*number) + 20);
			pdf.save(filename);
		});
	}
function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        var pdf = new jsPDF('p', 'pt', 'letter');
	 pdf.addHTML($('#alltickets')[0], function () {
	     pdf.save('Test1.pdf');
	 });
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
    }

