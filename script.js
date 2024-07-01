function addEducationalDetails() {
    const container = document.querySelector(".educationalDetailsFieldsContainer");
    const template = `
      <div class="form-group mt-2">
        <label for="degreeField">Degree/Course</label>
        <input type="text" placeholder="Enter Degree/course" class="form-control degree-course" required>
        <label for="startDateEducationField">Start Date</label>
        <input type="date" placeholder="Start Date" class="form-control start-date-education" required>
        <label for="endDateEducationField">End Date</label>
        <input type="date" placeholder="End Date" class="form-control end-date-education" required>
      </div>`;
    container.insertAdjacentHTML("beforeend", template);
  }
  
  // Function to remove educational details fields
  function removeEducationalDetails() {
    const container = document.querySelector(".educationalDetailsFieldsContainer");
    const fields = container.querySelectorAll(".form-group");
    if (fields.length > 1) {
      container.removeChild(fields[fields.length - 1]);
    }
  }

  function addHobby() {
    const container = document.querySelector(".hobbiesFieldsContainer .hobbies");
    const template = `
        <input type="text" placeholder="Enter a hobby" class="form-control hobby-input">
    `;
    container.insertAdjacentHTML("beforeend", template);
}

// Function to remove hobby
  function removeHobby() {
    const container = document.querySelector(".hobbiesFieldsContainer .hobbies");
    const hobbies = container.querySelectorAll(".hobby-input");
    if (hobbies.length > 1) {
        container.removeChild(hobbies[hobbies.length - 1]);
    }
}

  
  // Function to add work experience fields
  function addWorkExperience() {
    const container = document.querySelector(".workExperienceFieldsContainer");
    const template = `
      <div class="form-group mt-2">
        <label for="jobTitleField">Job Title</label>
        <input type="text" placeholder="Job Title" class="form-control job-title" required>
        <label for="workProfileField">Work Profile</label>
        <input type="text" placeholder="Work Profile" class="form-control work-profile" required>
        <label for="startDateField">Start Date</label>
        <input type="date" placeholder="Start Date" class="form-control start-date" required>
        <label for="endDateField">End Date</label>
        <input type="date" placeholder="End Date" class="form-control end-date" required>
      </div>`;
    container.insertAdjacentHTML("beforeend", template);
  }
  
  // Function to remove work experience fields
  function removeWorkExperience() {
    const container = document.querySelector(".workExperienceFieldsContainer");
    const fields = container.querySelectorAll(".form-group");
    if (fields.length > 1) {
      container.removeChild(fields[fields.length - 1]);
    }
  }
  function addSkill() {
    const container = document.querySelector(".skillsFieldsContainer");
    const template = `
        <textarea type="text" placeholder="Enter Skills" rows="1" class="form-control"></textarea>`;
    container.insertAdjacentHTML("beforeend", template);
}

// Function to remove skill
function removeSkill() {
    const container = document.querySelector(".skillsFieldsContainer");
    const skill = container.querySelector("textarea");
    if (skill) {
        container.removeChild(skill);
    }
}

// Function to add project
function addProject() {
    const container = document.querySelector(".projectFieldsContainer");
    const template = `
          <textarea type="text" placeholder="Project Name" rows="2" class="form-control project-name">`
    container.insertAdjacentHTML("beforeend", template);
}

// Function to remove project
function removeProject() {
    const container = document.querySelector(".projectFieldsContainer");
    const project = container.querySelector("textarea");
    if (project) {
        container.removeChild(project);
    }
}
  
  // Function to display selected image
  function displaySelectedImage(event) {
    const imagePreview = document.getElementById("imagePreview");
    if (event.target.files && event.target.files[0]) {
      const reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.src = e.target.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  }

  // Function to validate Name
function validateName() {
    const nameField = document.getElementById("nameField");
    const nameError = document.getElementById("name-error");
    
    // Regular expression to allow only letters and spaces, and name should be at least 3 characters long
    const namePattern = /^[A-Za-z\s]{3,}$/;

    if (!namePattern.test(nameField.value)) {
        nameError.textContent = "Name must contain only letters and be at least 3 characters long";
        nameField.classList.add("is-invalid");
        return false;
    } else {
        nameError.textContent = "";
        nameField.classList.remove("is-invalid");
        return true;
    }
}

// Event listener for Name field input
document.getElementById("nameField").addEventListener("input", validateName);
  // Function to validate Email
function validateEmail() {
  const emailField = document.getElementById("emailField");
  const emailError = document.getElementById("email-error");

  // Regular expression to validate email format
  const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

  if (!emailPattern.test(emailField.value)) {
      emailError.textContent = "Invalid email format";
      emailField.classList.add("is-invalid");
      return false;
  } else {
      emailError.textContent = "";
      emailField.classList.remove("is-invalid");
      return true;
  }
}

// Event listener for Email field input
document.getElementById("emailField").addEventListener("input", validateEmail);

  function validatePhone() {
    const phoneField = document.getElementById("phoneField");
    const phoneError = document.getElementById("phone-error");

    // Regular expression to allow only 10-digit numbers
    const phonePattern = /^\d{10}$/;

    if (!phonePattern.test(phoneField.value)) {
        phoneError.textContent = "Phone number must be 10 digits";
        phoneField.classList.add("is-invalid");
        return false;
    } else {
        phoneError.textContent = "";
        phoneField.classList.remove("is-invalid");
        return true;
    }
}

// Event listener for Phone No. field input
document.getElementById("phoneField").addEventListener("input", validatePhone);
// Function to validate Skills
function validateSkills() {
  const skillInput = document.getElementById("skillInput");
  const skillError = document.getElementById("skill-error");

  // Regular expression to allow only letters and spaces
  const skillPattern = /^[A-Za-z\s]+$/;

  if (!skillPattern.test(skillInput.value)) {
      skillError.textContent = "Skills must contain only letters and spaces";
      skillInput.classList.add("is-invalid");
      return false;
  } else {
      skillError.textContent = "";
      skillInput.classList.remove("is-invalid");
      return true;
  }
}

// Event listener for Skills field input
document.getElementById("skillInput").addEventListener("input", validateSkills);

  // Function to validate Hobbies
function validateHobbies() {
  const hobbyInput = document.querySelector(".hobbies input");
  const hobbyError = document.getElementById("hobby-error");

  // Regular expression to allow only letters and spaces
  const hobbyPattern = /^[A-Za-z\s]+$/;

  if (!hobbyPattern.test(hobbyInput.value)) {
      hobbyError.textContent = "Hobbies must contain only letters and spaces";
      hobbyInput.classList.add("is-invalid");
      return false;
  } else {
      hobbyError.textContent = "";
      hobbyInput.classList.remove("is-invalid");
      return true;
  }
}

// Event listener for Hobbies field input
document.querySelector(".hobbies input").addEventListener("input", validateHobbies);

  // Function to generate resume
  function generateResume() {

    // Get data from the form
    const name = document.getElementById("nameField").value;
    const email = document.getElementById("emailField").value;
    const phone = document.getElementById("phoneField").value;
    const address = document.getElementById("addressField").value;
    const educationList = document.querySelectorAll(".educationalDetailsFieldsContainer .form-group");
    const education = Array.from(educationList).map((edu) => ({
      degree: edu.querySelector(".degree-course").value || "", // Check if value exists or provide an empty string
      startDate: edu.querySelector(".start-date-education").value || "", // Check if value exists or provide an empty string
      endDate: edu.querySelector(".end-date-education").value || "", // Check if value exists or provide an empty string
    }));

    const hobbiesField = document.querySelector(".hobbiesFieldsContainer .hobbies");
    const hobbiesInputs = hobbiesField.querySelectorAll(".hobby-input");
    const hobbies = Array.from(hobbiesInputs).map((hobbyInput) => hobbyInput.value);

    const workExperienceList = document.querySelectorAll(".workExperienceFieldsContainer .form-group");
    const workExperience = Array.from(workExperienceList).map((work) => ({
      jobTitle: work.querySelector(".job-title").value || "", // Check if value exists or provide an empty string
      workProfile: work.querySelector(".work-profile").value || "", // Check if value exists or provide an empty string
      startDate: work.querySelector(".start-date").value || "", // Check if value exists or provide an empty string
      endDate: work.querySelector(".end-date").value || "", // Check if value exists or provide an empty string
    }));

    const skillsField = document.querySelector(".skillsFieldsContainer");
    const skillsTextareas = skillsField.querySelectorAll("textarea");
    const skills = Array.from(skillsTextareas).map((textarea) => textarea.value);

    const projectsField = document.querySelector(".projectFieldsContainer");
    const projectInputs = projectsField.querySelectorAll(".project-name");
    const projects = Array.from(projectInputs).map((projectInput) => projectInput.value);
  
    // Render data in the CV template
    document.getElementById("cv-name").innerText = name;
    document.getElementById("cv-email").innerText = email;
    document.getElementById("cv-phone").innerText = phone;
    document.getElementById("cv-address").innerText = address;
  
    const educationListElement = document.getElementById("educationList");
    educationListElement.innerHTML = education
      .map(
        (edu) =>
          `<strong>Degree/Course:</strong> <span class="degree-course">${edu.degree}</span><br>
            <strong>Start Date:</strong> <span class="start-date-education">${edu.startDate}</span><br>
            <strong>End Date:</strong> <span class="end-date-education">${edu.endDate}</span><br>`
      )
      .join("");

      // Render hobbies in the CV template
    const hobbiesListElement = document.getElementById("hobbiesList");
    hobbiesListElement.innerHTML = hobbies.map((hobby) => `<li>${hobby}</li>`).join("");
  
    const workExperienceListElement = document.getElementById("workExperienceList");
    workExperienceListElement.innerHTML = workExperience
      .map(
        (work) =>
          `<strong>Job Title:</strong> <span class="job-title">${work.jobTitle}</span><br>
            <strong>Work Profile:</strong> <span class="work-profile">${work.workProfile}</span><br>
            <strong>Start Date:</strong> <span class="start-date">${work.startDate}</span><br>
            <strong>End Date:</strong> <span class="end-date">${work.endDate}</span><br>`
      )
      .join("");

      // Render skills in the CV template
      const skillsListElement = document.getElementById("skillsList");
      skillsListElement.innerHTML = skills.map((skill) => `<li>${skill}</li>`).join("");

    // Render projects in the CV template
    const projectsListElement = document.getElementById("projectsList");
    projectsListElement.innerHTML = projects.map((project) => `<li>${project}</li>`).join("");

    document.getElementById("cv-form-container").style.display = "none";
    document.getElementById("cv-template-container").style.display = "block";

  }
{/*function cvTemplate () { document.getElementById("cv-template");
  html2canvas(cvTemplate).then((canvas) => {
    const imgData = canvas.toDataURL("image/png");
    const pdf = new jsPDF("p", "mm", "a4");
      pdf.addImage(imgData, "PNG", 0, 0, 210, 297);
      pdf.save("resume.pdf");
  });
}*/}

// Add an event listener to the "Print CV" button
document.getElementById("printCvButton").addEventListener("click", () => {
  const cvTemplate = document.getElementById("cv-template-container");
  const printButton = document.getElementById("printCvButton");

  printButton.style.display = "none";

  // Use html2canvas and jsPDF to generate PDF from the CV template
  html2canvas(cvTemplate).then((canvas) => {
      const imgData = canvas.toDataURL("image/png");
      const pdf = new jsPDF("p", "mm", "a4");
      const imgWidth = 210; // A4 width in mm
      const imgHeight = (canvas.height * imgWidth) / canvas.width;
      pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
      pdf.save("resume.pdf");

      printButton.style.display = "block";

  });
});
