<template>
  <AuthenticatedLayout>
    <Head title="Edit profile" />
    <div class="container container-top ">
      <div>
      <h1 class="text-2xl font-bold mb-4 fw-lighter mt-2 text-center">Edit Profile</h1>
      </div>
      <form @submit.prevent="submit" class="form mx-auto" enctype="multipart/form-data">
        <div class="row">
          <div class="col-12 col-lg-6">
          <label for="profile_pic" class="block font-medium"
            >Profile Picture</label
          >
          <input
            id="profile_pic"
            type="file" 
            accept="image/*"
            class="rounded px-3 py-2 w-full"
            @change="handleFileChange"
          />
          <!-- v-model="form.profile_pic" -->
        </div>

        <div class="col-12 col-lg-6 mt-2">
          <label for="address" class="block font-medium">Address</label>
          <input
            v-model="form.address"
            id="address"
            class="rounded px-3 py-2 w-full"
            placeholder="ex: Bonga, Bulan, Sorsogon"
          />
        </div>
        </div>

        <div class="mb-4 mt-2">
          <label for="bio" class="block font-medium">Bio</label>
          <textarea
            v-model="form.bio"
            id="bio"
            class="rounded px-3 py-2 w-full"
            placeholder="optional"
          ></textarea>
        </div>

       <div class="row">
        <div class="col-12 col-lg-6">
          <label for="contact" class="block font-medium">Contact</label>
          <input
            v-model="form.contact"
            id="contact"
            type="text"
            class=" rounded px-3 py-2 w-full"
            placeholder="ex: 09460163977"
          />
        </div>

        <div class="col-12 col-lg-6">
          <label for="facebook_link" class="block font-medium"
            >Social Links (optional)</label
          >
          <input
            type="text"
            v-model="form.facebook_link"
            id="facebook_link"
            class="rounded px-3 py-2 w-full"
            placeholder="facebook/twitter/instagram/etc."
          />
        </div>
       </div>

        <button
          type="submit"
          class="btn btn-dark mt-3"
        >
          Save Changes
        </button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
  
  <script setup>
import { useForm, Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { defineProps } from "vue";
const props = defineProps({
  user: {
    type: Object,
    default: () => ({}),
  },
  userInfo: {
    type: Object,
    default: () => ({}),
  },
});
const form = useForm({
  profile_pic: props.userInfo ? props.userInfo.profile_pic : "",
  address: props.userInfo ? props.userInfo.address : "",
  bio: props.userInfo ? props.userInfo.bio : "",
  contact: props.userInfo ? props.userInfo.contact : "",
  facebook_link: props.userInfo ? props.userInfo.facebook_link : "",
});

// const submit = () => {
//   form.put(route("user.update", props.user.id),{
//     onSuccess: () => alert('Sumitted!'),
//     onError: (errors) => console.error('An error occured while updatings profile => ' , errors)
//   });
// };

const submit = () => {
  const data = new FormData();
  data.append("profile_pic", form.profile_pic);
  data.append("address", form.address);
  data.append("bio", form.bio);
  data.append("contact", form.contact);
  data.append("facebook_link", form.social_links);

  console.log([...data.entries()]);
  form.put(route("user.update", props.user.id), {
    data,
    onSuccess: () => alert("Submitted!"),
    onError: (errors) => console.error("An error occurred while updating profile:", errors),
  });
};


const handleFileChange = (event) => {
    const file = event.target.files[0];
    form.profile_pic = file;
};

console.log("user => ", props.user);
console.log("userInfo => ", props.userInfo);

</script>
  
  <style scoped>
.form input , .form textarea{
  border: 1px solid rgba(0,0,0,.3);
}
.container-top{
  position: absolute;
  width: 100%;
  height: 100%;
}
/* @media screen and (max-width: 800px) {
  .container-top{
  position: absolute;
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
  
} */
@media screen and (max-width: 800px) {
  .container-top{
  position: absolute;
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
  
}
</style>
  