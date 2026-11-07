// Integrations and Automation Script

document.addEventListener('DOMContentLoaded', () => {
    const integrationSettings = document.getElementById('integration-settings');
    const saveButton = document.getElementById('save-button');

    // Fetch integration settings from the server
    fetch('/api/integration-settings')
        .then(response => response.json())
        .then(data => {
            integrationSettings.innerHTML = '';
            data.forEach(setting => {
                const row = document.createElement('div');
                row.className = 'integration-row';

                const name = document.createElement('span');
                name.textContent = setting.name;
                row.appendChild(name);

                const value = document.createElement('input');
                value.type = 'text';
                value.value = setting.value;
                row.appendChild(value);

                integrationSettings.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching integration settings:', error));

    // Save integration settings to the server
    saveButton.addEventListener('click', () => {
        const rows = document.querySelectorAll('.integration-row');
        const settings = Array.from(rows).reduce((acc, row) => {
            const name = row.querySelector('span').textContent;
            const value = row.querySelector('input').value;
            acc[name] = value;
            return acc;
        }, {});

        fetch('/api/integration-settings', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(settings)
        })
        .then(response => response.json())
        .then(data => console.log('Settings saved:', data))
        .catch(error => console.error('Error saving integration settings:', error));
    });
});
