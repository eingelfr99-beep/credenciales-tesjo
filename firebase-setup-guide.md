# 🔥 Guía de Configuración Firebase - Credenciales TESJo

## 📋 Pasos para Configurar Firebase

### 1. Crear Proyecto en Firebase Console

1. **Ve a [Firebase Console](https://console.firebase.google.com/)**
2. **Haz clic en "Crear un proyecto"**
3. **Nombre del proyecto**: `credenciales-tesjo-322a8` (o el que prefieras)
4. **Habilita Google Analytics** (opcional)
5. **Haz clic en "Crear proyecto"**

### 2. Habilitar Firestore Database

1. **En el panel izquierdo, haz clic en "Firestore Database"**
2. **Haz clic en "Crear base de datos"**
3. **Selecciona "Comenzar en modo de prueba"** (para desarrollo)
4. **Elige la ubicación**: `us-central1` (o la más cercana a tu ubicación)
5. **Haz clic en "Siguiente"**

### 3. Configurar Reglas de Seguridad

1. **En Firestore Database, ve a la pestaña "Reglas"**
2. **Reemplaza las reglas existentes con:**

```javascript
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    // Colección de credenciales - lectura pública, escritura solo desde admin
    match /credenciales/{matricula} {
      allow read: if true;  // Permite lectura pública
      allow write: if false; // Solo escritura desde admin (por ahora)
    }
    
    // Regla general - denegar todo lo demás
    match /{document=**} {
      allow read, write: if false;
    }
  }
}
```

3. **Haz clic en "Publicar"**

### 4. Crear la Colección y Documentos

1. **En Firestore Database, ve a la pestaña "Datos"**
2. **Haz clic en "Comenzar colección"**
3. **ID de la colección**: `credenciales`
4. **Haz clic en "Siguiente"**

#### Crear el primer documento:

1. **ID del documento**: `2022150480341`
2. **Agregar campos**:

| Campo | Tipo | Valor |
|-------|------|-------|
| `nombre` | string | `Angel Flores Rivero` |
| `carrera` | string | `Ingeniería en Sistemas` |
| `vigencia` | string | `Agosto 2025` |
| `foto` | string | `https://via.placeholder.com/150x150/0b1f41/ffffff?text=AF` |
| `estado` | string | `activo` |
| `fechaCreacion` | timestamp | `2024-01-01` |

3. **Haz clic en "Guardar"**

### 5. Obtener Configuración del Proyecto

1. **En el panel izquierdo, haz clic en el ícono de engranaje ⚙️**
2. **Selecciona "Configuración del proyecto"**
3. **Ve a la pestaña "General"**
4. **Desplázate hacia abajo hasta "Tus apps"**
5. **Haz clic en el ícono de web `</>`**
6. **Registra la app**:
   - **Apodo**: `credenciales-web`
   - **Habilita Firebase Hosting**: No (por ahora)
7. **Haz clic en "Registrar app"**
8. **Copia la configuración** que aparece

### 6. Actualizar el Código

Reemplaza la configuración en tu `index.html` con la nueva configuración:

```javascript
const firebaseConfig = {
  apiKey: "TU_API_KEY_AQUI",
  authDomain: "TU_PROJECT_ID.firebaseapp.com",
  projectId: "TU_PROJECT_ID",
  storageBucket: "TU_PROJECT_ID.appspot.com",
  messagingSenderId: "TU_SENDER_ID",
  appId: "TU_APP_ID"
};
```

## 🧪 Probar la Configuración

### Opción 1: Usar el archivo de prueba

1. **Abre `test-firebase.html` en tu navegador**
2. **Revisa los resultados** en la consola
3. **Deberías ver**: ✅ Firebase inicializado correctamente

### Opción 2: Probar desde la aplicación principal

1. **Abre `index.html` en tu navegador**
2. **Ingresa la matrícula**: `2022150480341`
3. **Haz clic en "Buscar"**
4. **Deberías ver la credencial** con los datos de Firebase

## 🔧 Solución de Problemas Comunes

### Error: "Permission denied"

**Causa**: Las reglas de Firestore no permiten lectura
**Solución**: Verifica que las reglas incluyan `allow read: if true;`

### Error: "Document does not exist"

**Causa**: El documento no existe en Firestore
**Solución**: Crea el documento con la matrícula correcta

### Error: "Firebase not initialized"

**Causa**: Configuración incorrecta
**Solución**: Verifica que la configuración coincida con tu proyecto

## 📊 Estructura de Datos Recomendada

```javascript
// Colección: credenciales
// Documento ID: matrícula (ej: "2022150480341")
{
  "nombre": "Angel Flores Rivero",
  "carrera": "Ingeniería en Sistemas", 
  "vigencia": "Agosto 2025",
  "foto": "https://ejemplo.com/foto.jpg",
  "estado": "activo",
  "fechaCreacion": "2024-01-01",
  "ultimaActualizacion": "2024-01-01"
}
```

## 🚀 Próximos Pasos

1. **Agregar más credenciales** de prueba
2. **Implementar autenticación** para administradores
3. **Configurar Firebase Hosting** para deployment
4. **Agregar validaciones** del lado del servidor
5. **Implementar backup** automático

## 📞 Soporte

Si tienes problemas:
1. **Revisa la consola del navegador** para errores
2. **Verifica las reglas de Firestore**
3. **Confirma que la configuración** sea correcta
4. **Prueba con el archivo `test-firebase.html`**

---

**¡Con estos pasos tu aplicación debería funcionar perfectamente con Firebase!** 🎉 