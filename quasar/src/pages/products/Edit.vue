<template>
  <div class="q-my-xl">
    <q-card>
      <q-card-title>Edit product</q-card-title>
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
            url="http://127.0.0.1/upload/1/e/"
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
            url="http://127.0.0.1/upload/2/e/"
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
          <q-btn label="Update" color="primary" @click="updateProduct"/>
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
    updateProduct () {
      axios
        .put(`http://127.0.0.1/products/` + this.$route.params.id, this.productData)
        .then(response => {
          this.type = '1'
          this.$refs.uploader1.upload()
          this.type = '2'
          this.$refs.uploader2.upload()
          this.$q.notify({ type: 'positive', timeout: 2000, message: 'The product has been updated.' })
          this.$router.push({ path: '/products/index' })
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
            .post(`http://127.0.0.1/upload/1/e/` + this.productID, formData, {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            })
        } else {
          axios
            .post(`http://127.0.0.1/upload/2/e/` + this.productID, formData, {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            })
        }
      }
    }
  },
  mounted () {
    axios
      .get(`http://127.0.0.1/products/` + this.$route.params.id + '/edit')
      .then(response => {
        this.productID = response.data.id
        this.productCollection = response.data.collection
        this.productBrand = response.data.brand
        this.productModel = response.data.model
        this.productNickname = response.data.nickname
        this.productColor = response.data.color
        this.productGender = response.data.gender
        this.productSKU = response.data.sku
        this.productPrice = response.data.price
        this.productDetails = response.data.details
      })
      .catch(error => {
        this.$q.notify({ type: 'negative', timeout: 2000, message: 'Loading product: an error has been occured.' })
        console.log(error)
      })
  },
  computed: {
    productData: function () {
      return { collection: this.productCollection, brand: this.productBrand, model: this.productModel, nickname: this.productNickname, color: this.productColor, gender: this.productGender, sku: this.productSKU, price: this.productPrice, details: this.productDetails }
    }
  }
}
</script>
