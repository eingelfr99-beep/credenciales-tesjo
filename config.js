// config.js - Configuración de Firebase
// IMPORTANTE: En producción, considera usar variables de entorno

export const firebaseConfig = {
  apiKey: "AIzaSyAm-EoR6XKc3t86LGomNDbf2fBnEwmqwlk",
  authDomain: "credenciales-tesjo-322a8.firebaseapp.com",
  projectId: "credenciales-tesjo-322a8",
  storageBucket: "credenciales-tesjo-322a8.appspot.com",
  messagingSenderId: "153098875443",
  appId: "1:153098875443:web:53d5f6d1b54339aa5fa946"
};

// Configuraciones adicionales
export const appConfig = {
  // Formato de matrícula esperado
  matriculaFormat: /^\d{13}$/,
  
  // Mensajes de error
  messages: {
    matriculaRequired: "Por favor, ingresa una matrícula válida.",
    matriculaInvalid: "El formato de la matrícula no es válido. Debe tener 13 dígitos.",
    notFound: "No se encontró ninguna credencial con esa matrícula.",
    incomplete: "La credencial está incompleta. Contacta a administración.",
    error: "Error al buscar la credencial. Intenta nuevamente.",
    loading: "Buscando credencial..."
  },
  
  // Configuración del QR
  qrConfig: {
    width: 128,
    height: 128,
    colorDark: "#000000",
    colorLight: "#ffffff"
  }
}; 