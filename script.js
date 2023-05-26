// Array to store added medications
let medications = [];

// Function to handle form submission
function submitForm(event) {
  event.preventDefault();

  const medicationName = document.getElementById('medication-name').value;
  const dosage = document.getElementById('dosage').value;
  const frequency = document.getElementById('frequency').value;

  // Create medication object
  const medication = {
    name: medicationName,
    dosage: dosage,
    frequency: frequency
  };

  // Add medication to the array
  medications.push(medication);

  // Clear form fields
  document.getElementById('medication-name').value = '';
  document.getElementById('dosage').value = '';
  document.getElementById('frequency').value = 'once';

  // Refresh medication list
  displayMedications();
}

// Function to display medications in the list
function displayMedications() {
  const medicationList = document.getElementById('medication-list');
  medicationList.innerHTML = '';

  medications.forEach((medication, index) => {
    const listItem = document.createElement('li');
    listItem.classList.add('medication-item');

    const name = document.createElement('span');
    name.classList.add('name');
    name.textContent = medication.name;

    const dosage = document.createElement('span');
    dosage.classList.add('dosage');
    dosage.textContent = `Dosage: ${medication.dosage}`;

    const editButton = document.createElement('button');
    editButton.classList.add('edit-button');
    editButton.textContent = 'Edit';
    editButton.addEventListener('click', () => editMedication(index));

    const deleteButton = document.createElement('button');
    deleteButton.classList.add('delete-button');
    deleteButton.textContent = 'Delete';
    deleteButton.addEventListener('click', () => deleteMedication(index));

    listItem.appendChild(name);
    listItem.appendChild(dosage);
    listItem.appendChild(editButton);
    listItem.appendChild(deleteButton);

    medicationList.appendChild(listItem);
  });
}

// Function to edit medication
function editMedication(index) {
  const medication = medications[index];

  const updatedName = prompt('Enter new medication name:', medication.name);
  if (updatedName !== null) {
    medication.name = updatedName;
    displayMedications();
  }
}

// Function to delete medication
function deleteMedication(index) {
  medications.splice(index, 1);
  displayMedications();
}

// Event listener for form submission
document.getElementById('form').addEventListener('submit', submitForm);
