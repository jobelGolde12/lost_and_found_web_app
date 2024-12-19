<template>
    <div class="card mx-auto my-4" style="max-width: 400px; border: 2px solid #000; padding: 15px; background-color: #f5f5f5;">
      <div class="text-center">
        <h1 class="text-danger fw-bold" style="font-family: 'Courier New', monospace;">MISSING</h1>
      </div>
      <div class="text-center mt-3">
        <img
          src="https://via.placeholder.com/300" <!-- Replace with actual image URL -->
          alt="Missing pet"
          class="img-fluid rounded"
          style="max-height: 300px;"
        />
      </div>
      <div class="text-center mt-3">
        <h3 class="fw-bold" style="font-family: 'Courier New', monospace;">mingming</h3>
        <p class="text-muted">Last seen at 12th Street of Goulerst Village</p>
        <p class="text-danger fw-bold">Call <a href="tel:1234567890" class="text-decoration-none text-danger">123-456-7890</a></p>
        <p class="text-muted">for any leads. Thank you!</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "MissingPetCard",
  };
  </script>
  
  <style scoped>
  .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
  }
  </style>
  