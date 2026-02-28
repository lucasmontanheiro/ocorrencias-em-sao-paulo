# Estatísticas Criminais do Estado de São Paulo

Este é um aplicativo web público desenvolvido para apresentar as estatísticas trimestrais das ocorrências policiais do Estado de São Paulo, Brasil. O projeto consome dados oficiais e os apresenta de forma visual e interativa para facilitar a análise da segurança pública.

## 🚀 Funcionalidades

- **Visualização Interativa**: Gráficos dinâmicos de linhas ou barras para análise de tendências.
- **Filtros Personalizados**: 
  - Seleção por **Natureza da Ocorrência** (Homicídio, Roubo, Furto, etc).
  - Seleção por **Região** (Capital, Grande SP, Interior e todos os Deinter - Departamentos de Polícia Judiciária de São Paulo Interior).
  - Filtros por **Ano e Trimestre**.
- **Tabela de Dados**: Exibição dos números absolutos em formato de tabela para conferência detalhada.
- **Exportação**: Opções para baixar o gráfico atual nos formatos **PNG** (Imagem) ou **PDF**.
- **Fonte Oficial**: Link direto para a fonte de dados da Secretaria de Segurança Pública (SSP).

## 🛠️ Tecnologias Utilizadas

O projeto foi construído utilizando tecnologias web modernas e leves:

- **HTML5 & CSS3**: Estrutura e estilização customizada.
- **Bootstrap 5**: Framework CSS para garantir responsividade e componentes modernos.
- **JavaScript (Vanilla)**: Lógica principal da aplicação sem necessidade de frameworks complexos.
- **Chart.js**: Biblioteca poderosa para geração dos gráficos interativos.
- **PapaParse**: Processamento eficiente do arquivo TSV (Tab-Separated Values).
- **jsPDF**: Geração de relatórios em PDF diretamente no navegador.

## 📊 Fonte de Dados e Crawler

O aplicativo utiliza dados capturados diretamente do portal da Secretaria de Segurança Pública de São Paulo (SSP-SP) através de um script de automação (`crawler.py`).

- **Crawler**: O script em Python captura as estatísticas trimestrais de todas as regiões e categorias.
- **Arquivo de Dados**: As informações consolidadas são armazenadas no arquivo `ssp_data_2016_2025.csv`, que serve como fonte principal para a interface web.

Para atualizar os dados:
```bash
python3 crawler.py
```

## 💻 Como Executar o Projeto

Como o aplicativo é puramente estático (Client-side), não é necessária a instalação de dependências ou servidores complexos para visualização.

1. Clone o repositório.
2. Certifique-se de que o arquivo `ssp_data_2016_2025.csv` está presente no diretório raiz.
3. Abra o arquivo `index.html` em qualquer navegador moderno.
4. Ou utilize uma extensão de "Live Server" no VS Code para uma melhor experiência de desenvolvimento.

## 📄 Licença

Este projeto é de domínio público para fins informativos e educacionais.
