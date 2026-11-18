// Function to switch between sections
function showSection(sectionId) {
    const sections = document.querySelectorAll('.container'); // جلب كل العناصر التي تحمل كلاس container
    sections.forEach(section => {
        section.style.display = 'none'; // إخفاء كل الأقسام
    });

    const activeSection = document.getElementById(sectionId); // تحديد القسم المطلوب عرضه
    activeSection.style.display = 'block'; // عرضه فقط
}

// Show Home section on load
document.addEventListener('DOMContentLoaded', () => {
    showSection('home'); // عند تحميل الصفحة، اعرض قسم home
});