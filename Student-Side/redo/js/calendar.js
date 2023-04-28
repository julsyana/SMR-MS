

const date = new Date();

document.querySelector(".mos-year .year").innerHTML = new Date().getFullYear();

date.setDate(1);

const monthDays = document.querySelector(".calendar .days");

const lastDay = new Date(
  date.getFullYear(),
  date.getMonth() + 1, 0).getDate();

const prevLastDay = new Date(
  date.getFullYear(),
  date.getMonth(), 0 ).getDate();


  

const firstDayIndex = date.getDay();

const lastDayIndex = new Date(
  date.getFullYear(),
  date.getMonth() + 1,
  0
).getDay();

const nextDays = 7 - lastDayIndex - 1;

const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

document.querySelector(".mos-year .month").innerHTML = months[date.getMonth()];


let days = "";

for (let x = firstDayIndex; x > 0; x--) {
  days += `<div class="day prev-date"> </div>`;
  
}

for (let i = 1; i <= lastDay; i++) {
  if (
    i <= new Date().getDate() &&
    date.getMonth() === new Date().getMonth()
  ) {
    days += `<div class="day today"> <input type="radio" name="day" value="${i}" id="${i}" hidden required disabled> <label for="${i}"> ${i} </label> </div>`;
    
  } else {
    days += `<div class="day"> <input type="radio" name="day" value="${i}" id="${i}" hidden required> <label for="${i}"> ${i} </label> </div>`;
  }
}

for (let j = 1; j <= nextDays; j++) {

  days += `<div class="day next-date"> </div>`;
  monthDays.innerHTML = days;

} 