// Demo page JavaScript

document.addEventListener('DOMContentLoaded', () => {
  const demoLabel = document.getElementById('demo-label');
  const demoButton = document.getElementById('demo-button');

  // Set the initial label text
  demoLabel.textContent = 'SIMULATED DEMO DATA';

  // Add a click event listener to the button
  demoButton.addEventListener('click', () => {
    // Simulate a demo data reset
    fetch('/api/demo/reset')
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Demo data reset successfully!');
        } else {
          alert('Failed to reset demo data.');
        }
      })
      .catch(error => {
        console.error('Error resetting demo data:', error);
        alert('An error occurred while resetting demo data.');
      });
  });
});
