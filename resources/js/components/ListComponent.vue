<template>
    <div class="container">
        <div class="row justify-content-center mb-5 mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><strong>Cadastro Cotação de Frete</strong></div>
                    <div class="card-body">
                        <form @submit.prevent="storeCotacao()">
                            <div class="form-group">
                                <input type="number" class="form-control" id="transportadora" placeholder="Transportadora" v-model="cotacao.transportadora_id">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="uf" placeholder="UF" v-model="cotacao.uf">
                            </div>
                            <div class="form-group">
                                <label for="percentual_cotacao">Percentual cotação (%)</label>
                                <input type="number" class="form-control" id="percentual_cotacao" step='0.01' value='0.00' placeholder='0.00' v-model="cotacao.percentual_cotacao">
                            </div>
                            <div class="form-group">
                                <label for="valor_extra">Valor extra (R$)</label>
                                <input type="number" class="form-control" id="valor_extra" step='0.01' value='0.00' placeholder='0.00' v-model="cotacao.valor_extra">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><strong>Cotar Frete</strong></div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="uf" placeholder="UF">
                            </div>
                            <div class="form-group">
                                <label for="percentual_cotacao">Percentual cotação (%)</label>
                                <input type="number" class="form-control" id="percentual_cotacao">
                            </div>
                            <button type="submit" class="btn btn-primary">Cotar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">UF</th>
                                <th scope="col">Percentual Frete</th>
                                <th scope="col">Valor Taxa</th>
                                <th scope="col">Transportadora</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="cotacao in cotacoes" :key="cotacao.id">
                                <td>{{ cotacao.id }}</td>
                                <td>{{ cotacao.uf }}</td>
                                <td>{{ cotacao.percentual_cotacao }}</td>
                                <td>{{ cotacao.valor_extra }}</td>
                                <td>{{ cotacao.transportadora_id }}</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                cotacao: {
                    uf: null,
                    percentual_cotacao: null,
                    valor_extra: null,
                    transportadora_id: null
                },
                cotacoes: []
            }
        },

        mounted() {
            this.getCotacao();
        },

        methods: {
            storeCotacao() {
                axios.post('/api/cotacao', {
                    uf: this.cotacao.uf,
                    percentual_cotacao: this.cotacao.percentual_cotacao,
                    valor_extra: this.cotacao.valor_extra,
                    transportadora_id: this.cotacao.transportadora_id
                })
                .then(response => {
                    this.cotacao.uf = null;
                    this.cotacao.percentual_cotacao = null;
                    this.cotacao.valor_extra = null;
                    this.cotacao.transportadora_id = null;
                    alert("Cotação cadastrada com sucesso!")
                })
                .catch(error => {
                    console.log(error);
                    console.log(this.cotacao);
                });
            },

            getCotacao() {
                axios.get('/api/cotacao')
                .then(response => {
                    this.cotacoes = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
                .then(() => {
                    // always executed
                });
            }
        }
    }
</script>
