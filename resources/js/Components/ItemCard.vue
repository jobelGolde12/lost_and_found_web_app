<template>
    <div class="card mx-auto my-4">
      <div class="text-center">
        <h1 class="text-danger fw-bold" style="font-family: 'Courier New', monospace;">MISSING</h1>
      </div>
      <div class="text-center mt-3">
        <img
          src="../../images/missing-bike.jpg"
          alt="Missing pet"
          class="img-fluid rounded card-img"
        />
      </div>
      <div class="text-start mt-3">
        <h3 class="fw-bold mb-0" style="font-family: 'Courier New', monospace;">My bike</h3>
        <p class="text-muted">Pink na bag na may apat na rida</p>
        
        <div class=" container-fluid px-0 d-flex flex-row gap-2 justify-content-center align-items-center">
          <div class="d-flex flex-row gap-2 w-50">
             <div type="button" class="bi bi-telephone fs-5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Call Now!"></div>
             <div class="bi bi-facebook fs-5 "></div>
          </div>

          <div class="w-50 d-flex justify-content-end">
            <div class="bi bi-eye fs-5"></div>
          </div>


          <!-- <a href="tel:1234567890" class="text-decoration-none text-danger">123-456-7890</a> -->
        </div>
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
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    max-width: 350px; 
    padding: 15px; 
    background-color: rgba(239, 207, 207, 0.1);
  }
  .card .card-img{
    max-height: 150px;
    max-width: auto;
  }
  </style>
  