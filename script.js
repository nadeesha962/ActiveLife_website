
// For header 

let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
} 

// for window scroll 

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    if(window.scrollY > 0){
        document.querySelector('.header').classList.add('active');
    }else{
        document.querySelector('.header').classList.remove('active');
    }

}


window.onload = () =>{
  if(window.scrollY > 0){
      document.querySelector('.header').classList.add('active');
  }else{
      document.querySelector('.header').classList.remove('active');
  }
}

// for home pages 

var swiper = new Swiper(".home-slider", {
    spaceBetween: 20,
    effect: "fade",
    grabCursor: true,
    loop:true,
    centeredSlides: true,
    autoplay: {
      delay: 9500,
      disableOnInteraction: false,
    },
  });

//   for feature section 

var swiper = new Swiper(".feature-slider", {
    spaceBetween: 20,
    loop:true,
    grabCursor: true,
    centeredSlides: true,
    autoplay: {
        delay: 9500,
        disableOnInteraction: false,
      },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
    },
  });


  //   for trainers section 

var swiper = new Swiper(".trainer-slider", {
    spaceBetween: 20,
    loop:true,
    grabCursor: true,
    centeredSlides: true,
    autoplay: {
        delay: 9500,
        disableOnInteraction: false,
      },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
    },
  });

    //   for blogs section 

var swiper = new Swiper(".blogs-slider", {
  spaceBetween: 20,
  loop:true,
  grabCursor: true,
  centeredSlides: true,
  autoplay: {
      delay: 9500,
      disableOnInteraction: false,
    },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
  },
});

// Sample data for news articles
const newsArticles = [
  {
      id: 1,
      title: "5 Tips for Staying Active During the Winter",
      date: "2025-01-03",
      description: "Learn how to keep up with your fitness goals during the colder months.",
      link: "#"
  },
  {
      id: 2,
      title: "The Benefits of High-Intensity Interval Training (HIIT)",
      date: "2024-12-15",
      description: "Discover how HIIT can help you achieve your fitness goals faster.",
      link: "#"
  },
  {
      id: 3,
      title: "Why Rest Days Are Essential for Your Workout Routine",
      date: "2024-11-20",
      description: "Understand the importance of recovery days in your fitness journey.",
      link: "#"
  }
];

// Function to display news articles
function loadNews() {
  const newsContainer = document.getElementById('news-container');

  newsArticles.forEach(article => {
      const newsItem = document.createElement('div');
      newsItem.classList.add('news-item');

      newsItem.innerHTML = `
          <h2>${article.title}</h2>
          <p class="date">${new Date(article.date).toLocaleDateString()}</p>
          <p>${article.description}</p>
          <a href="${article.link}" class="read-more">Read More</a>
      `;

      newsContainer.appendChild(newsItem);
  });
}

// Function to filter news by keyword
function filterNews(keyword) {
  const filteredArticles = newsArticles.filter(article =>
      article.title.toLowerCase().includes(keyword.toLowerCase()) ||
      article.description.toLowerCase().includes(keyword.toLowerCase())
  );

  const newsContainer = document.getElementById('news-container');
  newsContainer.innerHTML = ''; // Clear current news

  filteredArticles.forEach(article => {
      const newsItem = document.createElement('div');
      newsItem.classList.add('news-item');

      newsItem.innerHTML = `
          <h2>${article.title}</h2>
          <p class="date">${new Date(article.date).toLocaleDateString()}</p>
          <p>${article.description}</p>
          <a href="${article.link}" class="read-more">Read More</a>
      `;

      newsContainer.appendChild(newsItem);
  });
}

// Event listener for the search bar
document.getElementById('search-bar').addEventListener('input', (e) => {
  filterNews(e.target.value);
});

// Load news on page load
document.addEventListener('DOMContentLoaded', loadNews);

// Function to validate form input
function validateForm(event) {
  event.preventDefault(); // Prevent form from submitting

  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const phone = document.getElementById('phone').value.trim();

  let isValid = true;
  let errorMessage = '';

  // Validate name
  if (name === '') {
      isValid = false;
      errorMessage += 'Name is required.\n';
  }

  // Validate email
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
      isValid = false;
      errorMessage += 'Enter a valid email address.\n';
  }

  // Validate phone
  const phonePattern = /^[0-9]{10,15}$/; // Adjust phone number length as needed
  if (!phonePattern.test(phone)) {
      isValid = false;
      errorMessage += 'Enter a valid phone number (10-15 digits).\n';
  }

  if (isValid) {
      displaySuccessMessage(name);
  } else {
      alert(errorMessage);
  }
}

// Function to display success message
function displaySuccessMessage(name) {
  const formContainer = document.getElementById('form-container');
  formContainer.innerHTML = `
      <h2>Thank You, ${name}!</h2>
      <p>You have successfully become a member of Active Life. We’ll get in touch with you shortly.</p>
  `;
}

// Event listener for form submission
document.getElementById('member-form').addEventListener('submit', validateForm);


// Get Started button functionality
document.getElementById('get-started-btn').addEventListener('click', function() {
  window.location.href = 'get-started.html'; // Redirect to Get Started page
});

// Download button functionality
document.getElementById('download-btn').addEventListener('click', function() {
  const fileUrl = 'path-to-your-file.pdf'; // Replace with the actual file URL
  const fileName = 'ActiveLife-Guide.pdf'; // Name for the downloaded file

  // Create a hidden <a> element to trigger the download
  const link = document.createElement('a');
  link.href = fileUrl;
  link.download = fileName;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link); // Clean up the DOM
});

//admin dashboard
document.addEventListener("DOMContentLoaded", () => {
  fetch("metrics.php")
      .then((response) => response.json())
      .then((data) => {
          document.getElementById("total-users").textContent = data.total_users;
          document.getElementById("total-trainers").textContent = data.total_trainers;
          document.getElementById("total-revenue").textContent = `$${data.total_revenue}`;
          document.getElementById("daily-active").textContent = data.daily_active;
      })
      .catch((error) => {
          console.error("Error fetching metrics:", error);
      });
});

// script.js

const addMemberBtn = document.getElementById('addMemberBtn');
const addMemberModal = document.getElementById('addMemberModal');
const closeModal = document.getElementById('closeModal');
const addMemberForm = document.getElementById('addMemberForm');
const membersTable = document.querySelector('#membersTable tbody');

// Open the modal
addMemberBtn.addEventListener('click', () => {
    addMemberModal.style.display = 'block';
});

// Close the modal
closeModal.addEventListener('click', () => {
    addMemberModal.style.display = 'none';
});

// Submit the form
addMemberForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(addMemberForm);

    fetch('add_member.php', {
        method: 'POST',
        body: formData
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert('Member added successfully');
                loadMembers(); // Reload the members table
            } else {
                alert('Error: ' + data.message);
            }
            addMemberModal.style.display = 'none';
            addMemberForm.reset();
        })
        .catch((error) => console.error('Error:', error));
});

// Load members into the table
function loadMembers() {
    fetch('get_members.php')
        .then((response) => response.json())
        .then((data) => {
            membersTable.innerHTML = '';
            data.forEach((member) => {
                const row = `
                    <tr>
                        <td>${member.id}</td>
                        <td>${member.name}</td>
                        <td>${member.email}</td>
                        <td>${member.contact}</td>
                    </tr>
                `;
                membersTable.insertAdjacentHTML('beforeend', row);
            });
        });
}

// Load members when the page loads
document.addEventListener('DOMContentLoaded', loadMembers);
