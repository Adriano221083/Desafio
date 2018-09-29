[![Build Status](https://travis-ci.com/rsilveira65/fale-mais.svg?branch=master)](https://travis-ci.com/rsilveira65/fale-mais)
# fale-mais
## Desafio

A empresa de telefonia Telzir, especializada em chamadas de longa distância nacional, vai
colocar um novo produto no mercado chamado FaleMais.
Normalmente um cliente Telzir pode fazer uma chamada de uma cidade para outra pagando
uma tarifa fixa por minuto, com o preço sendo pré-definido em uma lista com os códigos DDDs
de origem e destino:

| Origem | Destino  |  $/min |
|-----|-----|------|
| 011 | 016 | 1.90 |
| 016 | 011 | 2.90 | 
| 011 | 017 | 1.70 | 
| 017 | 011 | 2.70 |  
| 011 | 018 | 0.90 |
| 018 | 011 | 1.90 |  


Com o novo produto FaleMais da Telzir o cliente adquire um plano e pode falar de graça até um determinado tempo (em minutos) e só paga os minutos excedentes. Os minutos excedentes tem um acréscimo de 10% sobre a tarifa normal do minuto. Os planos são FaleMais 30 (30 minutos), FaleMais 60 (60 minutos) e FaleMais 120 (120 minutos).
A Telzir, preocupada com a transparência junto aos seus clientes, quer disponibilizar uma página na web onde o cliente pode calcular o valor da ligação. Ali, o cliente pode escolher os códigos das cidades de origem e destino, o tempo da ligação em minutos e escolher qual o plano FaleMais. O sistema deve mostrar dois valores: (1) o valor da ligação com o plano e (2) sem o plano. O custo inicial de aquisição do plano deve ser desconsiderado para este problema.

Ex:

| Origem | Destino  |  Tempo | Plano | Com FaleMais | Sem FaleMais |
|-----|-----|------|------|------|------|
| 011 | 016 | 20 | FaleMais 30 | $ 0,00 | $ 38,00 |
| 011 | 017 | 80 | FaleMais 60 | $ 37,40 | $ 136,00 |
| 018 | 011 | 200 | FaleMais 120 | $ 167,20 | $ 380,00 |
| 018 | 017 | 100 | FaleMais 30 | - | - |


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
Just make sure you have [Docker](https://docs.docker.com/install/) and [Docker Compose](https://docs.docker.com/compose/install/) properly installed.

```sh
docker --version
docker-compose --version
```

### Installing

```sh
cp symfony/application/app/config/parameters.yml.dist symfony/application/app/config/parameters.yml
```

```sh
cp .env_dist .env
```

```sh
docker-compose up -d
```

Create the database schema.

```sh
docker exec application bin/console doctrine:schema:update --force
```

```sh
docker exec application bin/console doctrine:fixture:load -n
```

Access your browser on [http://localhost](http://localhost)


![](https://i.imgur.com/wdykjO6.png)
![](https://i.imgur.com/fgSLg1L.png)


## API Route
[Download the Postman collection](https://www.getpostman.com/collections/7dd20bc51ae2802214ea)

### Calculate
```bash
POST: http://localhost/api/calculate/1/3/2/80
```

##### Response:
```bash
{
    "id": 3,
    "origin": {
        "id": 1,
        "code": "011"
    },
    "destination": {
        "id": 3,
        "code": "017"
    },
    "rate": 1.7,
    "time": 80,
    "rateCost": "136.00",
    "planRateCost": "37.40",
    "plan": {
        "id": 2,
        "name": "FaleMais 60",
        "time": 60
    }
}
```

## Unit Tests
Get unit test summary on executing

```sh
docker exec application composer test
```