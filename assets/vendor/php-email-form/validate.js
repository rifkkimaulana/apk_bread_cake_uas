function php_email_form_submit(thisForm, action, formData) {
  fetch(action, {
    method: "POST",
    body: formData,
    headers: { "X-Requested-With": "XMLHttpRequest" },
  })
    .then((response) => {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error(
          `${response.status} ${response.statusText} ${response.url}`
        );
      }
    })
    .then((data) => {
      thisForm.querySelector(".loading").style.display = "none";
      if (data.status === "success") {
        thisForm.querySelector(".sent-message").style.display = "block";
        thisForm.reset();
      } else {
        throw new Error(data.message);
      }
    })
    .catch((error) => {
      displayError(thisForm, error);
    });
}
