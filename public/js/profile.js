function showTab(tabId) {
    // Hide all main divs
    document.getElementById('main1').style.display = 'none';
    document.getElementById('main2').style.display = 'none';
    document.getElementById('main3').style.display = 'none';

    // Show the selected tab
    document.getElementById(tabId).style.display = 'block';
}

// Initial call to show the first tab
document.addEventListener('DOMContentLoaded', function() {
    showTab('main1');
});
