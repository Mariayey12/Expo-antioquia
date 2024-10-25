const hotels = [
    {
        name: "Landmark Hotel",
        description: "Un lujoso hotel con vistas espectaculares en El Poblado.",
        address: "Calle 10 # 41-30, Medellín",
        phone: "123456789",
        rating: 4.7,
    },
    {
        name: "The Boato Hotel",
        description: "Un acogedor hotel en Guatapé, ideal para escapadas.",
        address: "Carrera 30 # 4-60, Guatapé",
        phone: "987654321",
        rating: 4.5,
    },
    {
        name: "Hotel York Luxury Suites",
        description: "Suites de lujo en el corazón de El Poblado.",
        address: "Carrera 34 # 7-24, Medellín",
        phone: "234567890",
        rating: 4.8,
    },
    {
        name: "Lettera Hotel",
        description: "Hotel boutique con excelente servicio en El Poblado.",
        address: "Calle 9 # 43-26, Medellín",
        phone: "345678901",
        rating: 4.6,
    },
    {
        name: "Hotel & Golf Isak Aeropuerto",
        description: "Comodidad y relax, ideal para viajeros de negocios.",
        address: "Km 5, Rionegro",
        phone: "456789012",
        rating: 4.4,
    },
    {
        name: "574 Hotel",
        description: "Hotel moderno con instalaciones de primera en El Poblado.",
        address: "Calle 11 # 43-29, Medellín",
        phone: "567890123",
        rating: 4.5,
    },
    {
        name: "Leblón Suites Hotel",
        description: "Suites cómodas y bien equipadas en Medellín.",
        address: "Carrera 38 # 10-16, Medellín",
        phone: "678901234",
        rating: 4.6,
    },
    {
        name: "Novelty Suites Hotel",
        description: "Amplias suites y un servicio excepcional en El Poblado.",
        address: "Calle 9A # 42-29, Medellín",
        phone: "789012345",
        rating: 4.7,
    },
    // Agrega más hoteles aquí
];

const hotelList = document.getElementById('hotel-list');

hotels.forEach(hotel => {
    const hotelCard = document.createElement('div');
    hotelCard.className = 'hotel-card';
    hotelCard.innerHTML = `
        <h2>${hotel.name}</h2>
        <p><strong>Descripción:</strong> ${hotel.description}</p>
        <p><strong>Dirección:</strong> ${hotel.address}</p>
        <p><strong>Teléfono:</strong> ${hotel.phone}</p>
        <p><strong>Calificación:</strong> ${hotel.rating}</p>
    `;
    hotelList.appendChild(hotelCard);
});
