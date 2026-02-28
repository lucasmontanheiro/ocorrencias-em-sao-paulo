# Estatísticas Criminais do Estado de São Paulo

Este é um aplicativo web público e interativo para visualização das estatísticas trimestrais de ocorrências policiais no Estado de São Paulo, Brasil. O sistema automatiza a coleta de dados oficiais da Secretaria de Segurança Pública (SSP-SP) e os apresenta de forma clara e acessível.

## 🚀 Funcionalidades

- **Visualização Interativa**: Gráficos dinâmicos (Linhas ou Barras) utilizando **Chart.js**.
- **Filtros Avançados**:
  - **Natureza da Ocorrência**: Homicídios, roubos, furtos, entorpecentes, entre outros.
  - **Regiões**: Capital, Grande SP, Interior e todos os 10 Deinters (Departamentos de Polícia Judiciária).
  - **Temporal**: Seleção por Ano e Trimestre (dados históricos desde 2016).
- **Tabela de Resumo**: Exibição de valores absolutos formatados no padrão brasileiro.
- **Exportação**: Download do gráfico atual em **PNG** ou **PDF** para uso em relatórios.
- **Responsividade**: Interface otimizada para Desktop e dispositivos móveis via **Bootstrap 5**.

## 🛠️ Arquitetura e Tecnologias

O projeto é dividido em dois componentes principais:

### 1. Frontend (Interface do Usuário)
- **Tecnologias**: HTML5, CSS3, JavaScript (Vanilla), Bootstrap 5.
- **Bibliotecas**:
  - `Chart.js`: Renderização de gráficos.
  - `PapaParse`: Leitura e processamento do arquivo CSV local.
  - `jsPDF`: Geração de arquivos PDF no navegador.
- **Data Source**: Consome o arquivo local `ssp_data_2016_2025.csv` para garantir performance e disponibilidade offline.

### 2. Automação e Dados (Backend/Crawler)
- **Crawler (`crawler.py`)**: Script Python que realiza o web scraping das tabelas oficiais no portal da SSP-SP.
- **GitHub Actions**: Fluxo de trabalho automatizado que executa o crawler mensalmente, atualiza o arquivo CSV e realiza o commit das mudanças de forma autônoma.
- **Dependências**: `requests`, `beautifulsoup4`.

## 📊 Como os dados são atualizados

A atualização é totalmente automatizada via **GitHub Actions** (`.github/workflows/update_data.yml`):
1. O workflow é disparado no 1º dia de cada mês ou manualmente.
2. Instala as dependências listadas em `requirements.txt`.
3. Executa o `crawler.py`.
4. Comita qualquer alteração no `ssp_data_2016_2025.csv` de volta ao repositório.

Para rodar manualmente o crawler:
```bash
pip install -r requirements.txt
python3 crawler.py
```

## 💻 Como Executar o Projeto

1. Clone o repositório.
2. Abra o arquivo `index.html` em qualquer navegador moderno.
3. *Dica*: Se os dados não carregarem devido a políticas de CORS em arquivos locais, utilize uma extensão como o "Live Server" do VS Code ou um servidor HTTP simples (`python3 -m http.server`).

## 📄 Licença

Este projeto é de domínio público para fins informativos, jornalísticos e educacionais. Os dados originais pertencem à Secretaria de Segurança Pública do Estado de São Paulo.
