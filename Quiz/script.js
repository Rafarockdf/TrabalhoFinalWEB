function fillButton(button) {
    // Remove background from all buttons first
    const buttons = document.querySelectorAll('.round-button');
    buttons.forEach(btn => {
      btn.style.backgroundColor = 'transparent';
      btn.style.color = '#01FF41';
    });
  
    // Fill the clicked button with a color
    button.style.backgroundColor = '##01FF41';
    button.style.color = '#fff';
  }
  