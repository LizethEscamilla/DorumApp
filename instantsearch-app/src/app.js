const { algoliasearch, instantsearch } = window;

const searchClient = algoliasearch(
  'ZZ7ZNQS9A0',
  'd708d6118a20f309f4b15d29f2223728'
);

const search = instantsearch({
  indexName: 'donors',
  searchClient,
  future: { preserveSharedStateOnUnmount: true },
});

search.addWidgets([
  instantsearch.widgets.searchBox({
    container: '#searchbox',
  }),
  instantsearch.widgets.hits({
    container: '#hits',
    templates: {
      item: (hit, { html, components }) => html`
        <article>
          <img src=${hit.avatar} alt=${hit.name} />
          <div>
            <h1>${components.Highlight({ hit, attribute: 'name' })}</h1>
            <p>${components.Highlight({ hit, attribute: 'tipo_sangre' })}</p>
            <p>${components.Highlight({ hit, attribute: 'id' })}</p>
          </div>
        </article>
      `,
    },
  }),
  instantsearch.widgets.configure({
    hitsPerPage: 8,
  }),
  instantsearch.widgets.pagination({
    container: '#pagination',
  }),
]);

search.start();
