let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () => {
	searchForm.classList.remove('active');
	navbar.classList.toggle('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () => {
	searchForm.classList.toggle('active');
	navbar.classList.remove('active');
}
let filtersearch = document.querySelector('.filter-search');

function showAlert() {
	var alertContainer = document.getElementById("alertContainer");
	alertContainer.innerHTML = `
	  <div class="alert alert-success alert-dismissible fade show" role="alert">
		Điều gì đó tốt đã xảy ra!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	`;
	alertContainer.style.display = "block";
  }


let pricelist = document.getElementsByName('price');
console.log(pricelist);

let amountElement = document.getElementsByName('amount');
let minus = document.getElementsByName('minus');
let plus = document.getElementsByName('plus');
let thanhtien = document.getElementsByName('thanhtien');
let giatien = document.getElementsByName('gia');
let amount_pd = document.getElementById('pd_amount_dt');
if (amount_pd != null) pd_amount = amount_pd.value;

let tong = 0;
let total = document.getElementById('tong'); 
for (let i = 0; i < minus.length; i++)
{
	plus[i].addEventListener('click',function(){ pd_amount++; amount_pd.value = pd_amount; console.log(pd_amount);});
	minus[i].addEventListener('click',function(){ pd_amount--; amount_pd.value = pd_amount;console.log(amount_pd.value);});
	let gia = parseInt(giatien[i].innerText);
	let amount = amountElement[i].value;
	let render = (amount) => {
		amountElement[i].value = amount;
	}
	minus[i].addEventListener('click', function(){
		if(amount > 1){
			amount--;
			render(amount);
			tong = tong - gia;
		}
		return(0);
	}); 

	plus[i].addEventListener('click', function(){
		if(amount < 20){
			amount++;
			render(amount);
		}
	});

	amountElement[i].addEventListener('input', function(){
		amount = amountElement.value;
		amount = parseInt (amount);
		amount = (isNaN(amount)||amount == 0)?1:amount;
		render(amount);
    });
}













