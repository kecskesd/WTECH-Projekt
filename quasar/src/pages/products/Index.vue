<template>
  <div class="q-my-xl">
    <q-table
      :data="serverData"
      row-key="name"
      :pagination.sync="serverPagination"
      :loading="loading"
      @request="request"
      :columns="columns"
      title="List of products"
      binary-state-sort>
      <q-tr slot="body" slot-scope="props" :props="props">
        <q-td key="id" :props="props">
          <span>{{ props.row.id }}</span>
        </q-td>
        <q-td key="collection" :props="props">
          <span>{{ props.row.collection }}</span>
        </q-td>
        <q-td key="brand" :props="props">
          <span>{{ props.row.brand }}</span>
        </q-td>
        <q-td key="model" :props="props">
          <span>{{ props.row.model }}</span>
        </q-td>
        <q-td key="nickname" :props="props">
          <span>{{ props.row.nickname }}</span>
        </q-td>
        <q-td key="color" :props="props">
          <span>{{ props.row.color }}</span>
        </q-td>
        <q-td key="gender" :props="props">
          <span>{{ props.row.gender }}</span>
        </q-td>
        <q-td key="details" :props="props">
          <span>{{ props.row.details }}</span>
        </q-td>
        <q-td key="sku" :props="props">
          <span>{{ props.row.sku }}</span>
        </q-td>
        <q-td key="price" :props="props">
          <span>{{ props.row.price }}</span>
        </q-td>
        <q-td class="text-right">
          <div v-if="props.row.id == 'DELETED'">DELETED</div>
          <div v-else>
            <q-btn round icon="edit" class="q-mr-xs" @click="$router.push('/products/' + props.row.id + '/edit')" />
            <q-btn round icon="delete" @click="destroy(props.row.id, props.row.__index)"/>
          </div>
        </q-td>
      </q-tr>
    </q-table>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data () {
    return {
      columns: [
        { name: 'id', label: 'ID', field: 'id', sortable: true, align: 'left' },
        { name: 'collection', label: 'Collection', field: 'collection', sortable: true, align: 'left' },
        { name: 'brand', label: 'Brand', field: 'brand', sortable: true, align: 'left' },
        { name: 'model', label: 'Model', field: 'model', sortable: true, align: 'left' },
        { name: 'nickname', label: 'Nickname', field: 'nickname', sortable: true, align: 'left' },
        { name: 'color', label: 'Color', field: 'color', sortable: true, align: 'left' },
        { name: 'gender', label: 'Gender', field: 'gender', sortable: true, align: 'left' },
        { name: 'details', label: 'Details', field: 'details', sortable: true, align: 'left' },
        { name: 'sku', label: 'SKU', field: 'sku', sortable: true, align: 'left' },
        { name: 'price', label: 'Price', field: 'price', sortable: true, align: 'left' },
        { name: 'actions', label: 'Actions', sortable: false, align: 'left' }
      ],
      selected: [],
      loading: false,
      serverPagination: {
        page: 1,
        rowsNumber: 10,
        rowsPerPage: 5,
        sortBy: 'id',
        descending: true
      },
      serverData: []
    }
  },
  methods: {
    request ({ pagination }) {
      // QTable to "loading" state
      this.loading = true
      // fetch data
      axios
        .get(`http://127.0.0.1/products/list/${pagination.page}?rowsPerPage=${pagination.rowsPerPage}&sortBy=${pagination.sortBy}&descending=${pagination.descending}`)
        .then(({ data }) => {
          // updating pagination to reflect in the UI
          this.serverPagination = pagination

          // we also set (or update) rowsNumber
          this.serverPagination.rowsNumber = data.rowsNumber

          // then we update the rows with the fetched ones
          this.serverData = data.rows

          // finally we tell QTable to exit the "loading" state
          this.loading = false
        })
        .catch(error => {
          // there's an error... do SOMETHING
          console.log(error)

          // we tell QTable to exit the "loading" state
          this.loading = false
        })
    },
    destroy (id, rowIndex) {
      this.$q.dialog({
        title: 'Delete',
        message: 'Are you sure to delete ' + id + '?',
        color: 'primary',
        ok: true,
        cancel: true
      }).then(() => {
        axios
          .delete(`http://127.0.0.1/products/${id}`)
          .then(() => {
            this.serverData[rowIndex].id = 'DELETED'
            this.$q.notify({ type: 'positive', timeout: 2000, message: 'The product has been deleted.' })
          })
          .catch(error => {
            this.$q.notify({ type: 'negative', timeout: 2000, message: 'An error has been occured.' })
            console.log(error)
          })
      }).catch(() => {
        // cancel - do nothing?
      })
    }
  },
  mounted () {
    // once mounted, we need to trigger the initial server data fetch
    this.request({
      pagination: this.serverPagination,
      filter: this.filter
    })
  }
}
</script>
