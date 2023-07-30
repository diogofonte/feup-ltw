const changeAllArticleColors = () => {
    const articles = document.querySelectorAll("#products");
    articles.forEach(article => {
        article.classList.add("sale");
    });
}