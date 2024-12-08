
async function fetchAndRenderTable() {
    try {
        // Fetch data from API
        const response = await axios.get('/users');

        // Mapping data response for Grid.js columns
        const jsonRes = response.data.data.map(value => [
            value.id,
            value.email,
            value.role,
            value.id
        ]);

        // Initialize Grid.js
        new gridjs.Grid({
            columns: [
                "id",
                "email",
                "role",
                {
                    name: "action",
                    formatter: (cell, row) => {
                        return gridjs.h('div', { style: 'display: flex; gap: 10px;' }, [
                            gridjs.h(
                                'button',
                                {
                                    style: 'background-color: blue; color: white; border: none; padding: 5px; cursor: pointer;',
                                    onClick: () => {
                                        alert(`Editing "${row.cells[0].data}" "${row.cells[1].data}"`);
                                    }
                                },
                                'Edit'
                            ),
                            gridjs.h(
                                'button',
                                {
                                    style: 'background-color: red; color: white; border: none; padding: 5px; cursor: pointer;',
                                    onClick: () => {
                                        alert(`Deleting "${row.cells[0].data}" "${row.cells[1].data}"`);
                                    }
                                },
                                'Delete'
                            )
                        ]);
                    }
                }
            ],
            data: jsonRes,
            pagination: {
                enabled: true,
                limit: 1,
            },
            style: {
                table: {
                    border: '2px solid black'
                },
                th: {
                    'background-color': 'rgba(0, 0, 0, 0.1)',
                    color: '#000',
                    'text-align': 'center'
                },
                td: {
                    'text-align': 'center',
                    border:'1px solid black'
                }
            },
            sort: true,
            search: true,
            language: {
                search: {
                    placeholder: "Cari data...",
                },
                noRecordsFound: "Tidak ada data yang ditemukan",
                pagination: {
                    previous: "Sebelumnya",
                    next: "Berikutnya",
                    showing: "Menampilkan",
                    of: "dari",
                    to: "ke",
                    results: "hasil",
                }
            }
        }).render(document.getElementById("table"));

    } catch (error) {
        console.error('Error fetching data:', error);

        // Display error message using SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong while fetching data!',
            footer: 'Please try again later.',
        });
    }
}

// Call the async function to fetch data and render table
fetchAndRenderTable();
