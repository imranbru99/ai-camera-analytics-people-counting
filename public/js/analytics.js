// Analytics.js - Handles analytics-related functionality

document.addEventListener('DOMContentLoaded', () => {
    // Initialize analytics report list
    const analyticsReportList = document.getElementById('analytics-report-list');
    if (analyticsReportList) {
        fetch('/api/v1/analytics/reports')
            .then(response => response.json())
            .then(data => {
                data.forEach(report => {
                    const li = document.createElement('li');
                    li.textContent = report.title;
                    analyticsReportList.appendChild(li);
                });
            })
            .catch(error => console.error('Error fetching analytics reports:', error));
    }
});
