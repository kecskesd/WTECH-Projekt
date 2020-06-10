<template>
  <div class="q-my-xl">
    <q-card>
      <q-card-title>Create new product</q-card-title>
      <q-card-main>
        <q-field :count="25">
          <q-input float-label="Brand" v-model="productBrand" max-length="25" />
        </q-field>
        <q-field :count="25">
          <q-input float-label="Model" v-model="productModel" max-length="25" />
        </q-field>
        <q-field :count="25">
          <q-input float-label="Nickname" v-model="productNickname" max-length="25" />
        </q-field>
        <q-field :count="10">
          <q-input float-label="Color" v-model="productColor" max-length="10" />
        </q-field>
        <q-field :count="5">
          <q-input float-label="Gender" v-model="productGender" max-length="5" />
        </q-field>
        <q-field :count="10">
          <q-input float-label="SKU" v-model="productSKU" max-length="10" />
        </q-field>
        <q-field :count="10">
          <q-input float-label="Price" v-model="productPrice" max-length="10" />
        </q-field>
        <q-field :count="500">
          <q-input
            type="textarea"
            float-label="Details"
            v-model="productDetails"
            :max-height="100"
            rows="7"
          />
        </q-field>
        <q-field>
          <q-select float-label="Category" v-model="productCollection" :options="collections" />
        </q-field>
        <q-field helper="Image with .jpg extension" class="q-mt-lg">
          <q-uploader
            ref="uploader1"
            url="http://127.0.0.1/upload/1/c/"
            :upload-factory="uploadImage"
            hide-upload-button
            hide-upload-progress
            extensions=".jpg"
            float-label="Upload miniature"
          />
        </q-field>
        <q-field helper="Image with .jpg extension" class="q-mt-lg">
          <q-uploader
            ref="uploader2"
            url="http://127.0.0.1/upload/2/c/"
            :upload-factory="uploadImage"
            hide-upload-button
            hide-upload-progress
            extensions=".jpg"
            float-label="Upload product image"
          />
        </q-field>
      </q-card-main>
      <q-card-actions class="q-mt-md">
        <div class="row justify-end full-width docs-btn">
          <q-btn label="Cancel" flat to="/products/index"/>
          <q-btn label="Create" color="primary" @click="createProduct"/>
        </div>
      </q-card-actions>
    </q-card>
  </div>
</template>
<style lang="stylus">
.docs-btn .q-btn
    padding 15px 20px
</style>
<script>
import axios from 'axios'

export default {
  data () {
    return {
      type: '',
      productID: '',
      productCollection: '',
      collections: [{ label: 'All', value: 'All' }, { label: 'On Sale', value: 'On Sale' }, { label: 'New Releases', value: 'New Releases' }],
      productBrand: '',
      productModel: '',
      productNickname: '',
      productColor: '',
      productGender: '',
      productSKU: '',
      productPrice: '',
      productDetails: ''
    }
  },
  methods: {
    createProduct () {
      axios
        .post(`http://127.0.0.1/products`, this.productData)
        .then(response => {
          this.productID = response.data.id
          this.type = '1'
          this.$refs.uploader1.upload()
          this.type = '2'
          this.$refs.uploader2.upload()
          this.$q.notify({ type: 'positive', timeout: 2000, message: 'The product has been created.' })
          this.$router.push({ path: '/products/index' })
          this.productID = ''
        })
        .catch(error => {
          this.$q.notify({ type: 'negative', timeout: 2000, message: 'An error has been occured.' })
          this.productID = ''
          console.log(error)
        })
    },
    uploadImage (file, updateProgress) {
      if (this.productID) {
        let formData = new FormData()
        formData.append('image', file)
        if (this.type === '1') {
          axios
            .post(`http://127.0.0.1/upload/1/c/` + this.productID, formData, {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            })
        } else {
          axios
            .post(`http://127.0.0.1/upload/2/c/` + this.productID, formData, {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            })
        }
      }
    }
  },
  computed: {
    productData: function () {
      return { collection: this.productCollection, brand: this.productBrand, model: this.productModel, nickname: this.productNickname, color: this.productColor, gender: this.productGender, sku: this.productSKU, price: this.productPrice, details: this.productDetails }
    }
  }
}
</script>
