/*Savannah Park*/
/*use js to search for letter/word to filter for a specific mentor*/
const search=()=>{
	const searchbox=document.getElementById("search-mentor").value.toUpperCase();
	const storementors=document.getElementById("mentorlist");
	const thementor=document.querySelectorAll(".thementor");
	const mentorunit=storementors.getElementsByClassName("mentordetails");
	
	
	for (var i=0; i < mentorunit.length; i++){
		let match=thementor[i].getElementsByClassName("mentordetails")[0];
		
		if(match){
			let textvalue=match.textContent || match.innerHTML
			
			if (textvalue.toUpperCase().indexOf(searchbox) >-1){thementor[i].style.display="";}
			else 
				thementor[i].style.display="none";
	
		}
	}
}