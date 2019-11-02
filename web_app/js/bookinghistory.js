

function download_pass(pids){
	window.open('boardingpass.php?pids='+pids, 'newwindow');
}

function cancel_tic(pids){
	var p = pids.split(".");
	var flag = 0;
	for (var i = 0; i < p.length; i++) {
		$.ajax({
			url: "canceltic.php",
			data:{
				pid: p[i]
			},
			type: "post",
			success:function(obj){
				if(obj != "success")
					flag = 1;
			}
		});
	}
	if(flag == 1){
		alert("Some error occured");
	}
	else{
		alert("Cancelled tickets.");
	}
	location.reload();
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


