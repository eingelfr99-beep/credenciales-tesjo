# Credenciales Electrónicas - TESJo

Sistema web para consulta de credenciales electrónicas de estudiantes de la Universidad TESJo.

## 🎯 Características

- ✅ Consulta de credenciales por matrícula
- ✅ Validación de formato de matrícula (13 dígitos)
- ✅ Generación automática de códigos QR
- ✅ Diseño responsive y moderno
- ✅ Integración con Firebase Firestore
- ✅ Manejo de errores y estados de carga
- ✅ Interfaz intuitiva y accesible

## 🚀 Tecnologías Utilizadas

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Base de Datos**: Firebase Firestore
- **Autenticación**: Firebase (configurado pero no implementado)
- **Generación QR**: qrcode.js
- **Fuentes**: Google Fonts (Poppins)
- **Hosting**: Firebase Hosting (recomendado)

## 📁 Estructura del Proyecto

```
credenciales_U/
├── index.html          # Página principal
├── styles.css          # Estilos CSS
├── config.js           # Configuración de Firebase
├── README.md           # Documentación
├── 1.png              # Logo de la universidad
├── logo.png           # Logo para credenciales
└── default-avatar.png  # Avatar por defecto (crear)
```

## 🔧 Configuración

### 1. Firebase Setup

1. Crea un proyecto en [Firebase Console](https://console.firebase.google.com/)
2. Habilita Firestore Database
3. Crea una colección llamada `credenciales`
4. Configura las reglas de seguridad

### 2. Estructura de Datos en Firestore

```javascript
// Colección: credenciales
// Documento ID: matrícula (ej: "2022150480341")
{
  "nombre": "Angel Flores Rivero",
  "carrera": "Ingeniería en Sistemas",
  "vigencia": "Agosto 2025",
  "foto": "https://ejemplo.com/foto.jpg",
  "estado": "activo",
  "fechaCreacion": "2024-01-01"
}
```

### 3. Reglas de Seguridad de Firestore

```javascript
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    match /credenciales/{matricula} {
      allow read: if true; // Permite lectura pública
      allow write: if false; // Solo escritura desde admin
    }
  }
}
```

## 🎨 Personalización

### Colores del Tema

```css
/* Colores principales */
--primary-color: #0b1f41;      /* Azul oscuro */
--secondary-color: #cc0000;     /* Rojo */
--accent-color: #16226c;        /* Azul medio */
--background-color: #e6ecf7;    /* Azul claro */
--text-color: #1a1a1a;         /* Negro */
```

### Modificar Estilos

1. Edita `styles.css` para cambiar colores, fuentes, etc.
2. Los estilos están organizados por secciones
3. Incluye diseño responsive para móviles

## 🔒 Seguridad

### Recomendaciones

1. **Variables de Entorno**: Mueve las credenciales de Firebase a variables de entorno
2. **Validación**: Implementa validación del lado del servidor
3. **Rate Limiting**: Limita las consultas por IP
4. **HTTPS**: Usa siempre HTTPS en producción
5. **CORS**: Configura CORS apropiadamente

### Implementación de Seguridad

```javascript
// Ejemplo de validación adicional
function validarMatricula(matricula) {
  // Validación más robusta
  const regex = /^\d{13}$/;
  if (!regex.test(matricula)) return false;
  
  // Validación de checksum (ejemplo)
  const digitos = matricula.split('').map(Number);
  const checksum = calcularChecksum(digitos);
  return checksum === digitos[12];
}
```

## 📱 Responsive Design

El sitio está optimizado para:
- 📱 Móviles (320px+)
- 📱 Tablets (768px+)
- 💻 Desktop (1024px+)

## 🚀 Deployment

### Firebase Hosting

1. Instala Firebase CLI:
```bash
npm install -g firebase-tools
```

2. Inicia sesión:
```bash
firebase login
```

3. Inicializa el proyecto:
```bash
firebase init hosting
```

4. Deploy:
```bash
firebase deploy
```

### Otros Hosting

- **Netlify**: Arrastra la carpeta del proyecto
- **Vercel**: Conecta tu repositorio Git
- **GitHub Pages**: Sube a un repositorio público

## 🔄 Próximas Mejoras

### Funcionalidades Planificadas

- [ ] Autenticación de usuarios
- [ ] Panel de administración
- [ ] Exportación a PDF
- [ ] Notificaciones push
- [ ] Historial de consultas
- [ ] Validación de vigencia automática
- [ ] Integración con sistemas universitarios

### Mejoras Técnicas

- [ ] PWA (Progressive Web App)
- [ ] Service Workers para offline
- [ ] Caché inteligente
- [ ] Métricas y analytics
- [ ] Tests automatizados
- [ ] CI/CD pipeline

## 🐛 Solución de Problemas

### Problemas Comunes

1. **Error de CORS**: Verifica las reglas de Firestore
2. **Credenciales no encontradas**: Revisa la estructura de datos
3. **QR no se genera**: Verifica la librería qrcode.js
4. **Estilos no cargan**: Verifica la ruta de `styles.css`

### Debug

```javascript
// Habilitar logs detallados
console.log('Buscando matrícula:', matricula);
console.log('Datos encontrados:', datos);
```

## 📞 Soporte

Para soporte técnico:
- 📧 Email: soporte@tesjo.edu
- 📱 Teléfono: +52 123 456 7890
- 🌐 Web: https://tesjo.edu

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Ver `LICENSE` para más detalles.

---

**Desarrollado con ❤️ para la Universidad TESJo** 