# Endpoints del sistema — versión resumida

Guía compacta para conectar el frontend con el backend. Se mantiene la información necesaria: **vistas, endpoints, método HTTP, filtros/body y respuesta esperada**.

---

## 1. Constantes del sistema

```ts
type Category = 'Combos' | 'Cafés' | 'Bebidas' | 'Masitas' | 'Frutas';
type OrderType = 'Interno' | 'Externo / Delivery' | 'Por contrato' | 'Evento';
type PaymentMethod = 'Efectivo' | 'Tarjeta' | 'Transferencia' | 'QR' | 'Otros';
type Role = 'admin' | 'supervisor' | 'cashier';
```

---

## 2. Tipos base

```ts
type Product = {
  id: string;
  name: string;
  price: number;
  normalPrice?: number;
  category: Category;
  image: string;
  description?: string;
  isCombo?: boolean;
  comboItems?: { productId: string; quantity: number }[];
  ingredients?: string[];
  extras?: { name: string; price: number }[];
};

type CartItem = {
  cartId: string;
  product: Product;
  quantity: number;
  size?: string;
  ingredients: string[];
  notes?: string;
  totalPrice: number;
};

type Sale = {
  id: string;
  date: string;
  items: CartItem[];
  total: number;
  orderType: OrderType;
  paymentMethod: PaymentMethod;
  observations: string;
  employee: string;
};

type Employee = {
  id: string;
  name: string;
  role: Role;
  active: boolean;
};
```

---

## 3. Endpoints por vista

### Login — `/login`

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `POST` | `/api/auth/login` | Iniciar sesión | `{ username, password, keepSession }` | `{ token, user: { id, name, role } }` |
| `POST` | `/api/auth/logout` | Cerrar sesión | — | — |

---

### Inicio / Productos — `/home`

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `GET` | `/api/products` | Listar productos y combos | Query opcional: `{ category?, search? }` | `{ products: Product[] }` |
| `PATCH` | `/api/cart/order-type` | Cambiar tipo de venta | `{ orderType: OrderType }` | — |

---

### Configurar producto — `/product/:id`

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `GET` | `/api/products/:productId` | Ver detalle del producto | Params: `productId` | `{ product: Product }` |
| `POST` | `/api/cart/items` | Agregar producto configurado al carrito | `AddProductToCartDTO` | `{ item: CartItem, cartTotal: number }` |

```ts
type AddProductToCartDTO = {
  productId: string;
  quantity: number;
  size?: string;
  selectedExtras: string[];
  excludedIngredients: string[];
  notes?: string;
};
```

---

### Configurar combo — `/combo/:id`

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `GET` | `/api/combos/:comboId` | Ver detalle del combo | Params: `comboId` | `{ combo: Product }` |
| `POST` | `/api/cart/items/combo` | Agregar combo configurado al carrito | `AddComboToCartDTO` | `{ item: CartItem, cartTotal: number }` |

```ts
type AddComboToCartDTO = {
  comboId: string;
  quantity: number;
  customizedItems: {
    productId: string;
    quantity: number;
    selectedExtras: string[];
    excludedIngredients: string[];
    extraPrice: number;
  }[];
};
```

---

### Crear producto — `/create-product`

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `POST` | `/api/products` | Crear producto nuevo | `CreateProductDTO` | `{ product: Product }` |
| `POST` | `/api/uploads/products` | Subir imagen de producto | `{ file: File }` | `{ imageUrl: string }` |

```ts
type CreateProductDTO = {
  name: string;
  description?: string;
  price: number;
  category: 'Cafés' | 'Bebidas' | 'Masitas' | 'Frutas';
  image?: string;
  ingredients?: string[];
  extras?: { name: string; price: number }[];
};
```

---

### Crear combo — `/create-combo`

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `POST` | `/api/combos` | Crear combo nuevo | `CreateComboDTO` | `{ combo: Product }` |

```ts
type CreateComboDTO = {
  name: string;
  description?: string;
  price: number;
  normalPrice: number;
  isActive: boolean;
  image?: string;
  comboItems: { productId: string; quantity: number }[];
};
```

---

### Carrito — `/cart`

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `GET` | `/api/cart` | Obtener carrito actual | — | `{ orderType, items: CartItem[], total }` |
| `PATCH` | `/api/cart/items/:cartId` | Cambiar cantidad de un item | Params: `cartId`, Body: `{ quantity }` | — |
| `DELETE` | `/api/cart/items/:cartId` | Quitar item del carrito | Params: `cartId` | — |
| `POST` | `/api/sales` | Guardar venta | `CreateSaleDTO` | `{ sale: Sale }` |

```ts
type CreateSaleDTO = {
  paymentMethod: PaymentMethod;
  orderType: OrderType;
  observations?: string;
  employee: string;
  items: CartItem[];
};
```

---

### Historial de ventas — `/sales`

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `GET` | `/api/sales` | Listar ventas | Query opcional: `SalesFilters` | `{ sales: Sale[], totalFiltered: number }` |

```ts
type SalesFilters = {
  search?: string;
  category?: Category;
  orderType?: OrderType;
  dateRange?: 'today' | 'yesterday' | 'this_week' | 'this_month';
};
```

---

### Cierre de caja — `/close`

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `GET` | `/api/register/summary` | Resumen del día | Query opcional: `{ date?: string }` formato `YYYY-MM-DD` | `RegisterSummary` |
| `POST` | `/api/register/closures` | Cerrar caja | `CloseRegisterDTO` | `{ closure: RegisterClosure }` |

```ts
type RegisterSummary = {
  totalSales: number;
  totalCash: number;
  totalQR: number;
  totalTransfer: number;
  totalCard: number;
  tips: number;
  refunds: number;
  salesCount: number;
};

type CloseRegisterDTO = {
  actualCash: number;
  actualQR: number;
  actualTransfer: number;
  observations?: string;
};

type RegisterClosure = {
  id: string;
  date: string;
  totalExpected: number;
  totalActual: number;
  observations: string;
};
```

---

### Empleados

| Método | Endpoint | Uso | Envía | Devuelve |
|---|---|---|---|---|
| `GET` | `/api/employees` | Listar empleados activos o disponibles para carrito, ventas y cierre | — | `{ employees: Employee[] }` |

---

## 4. Resumen rápido de endpoints

| Módulo | Endpoints principales |
|---|---|
| Auth | `POST /api/auth/login`, `POST /api/auth/logout` |
| Productos | `GET /api/products`, `GET /api/products/:productId`, `POST /api/products` |
| Combos | `GET /api/combos/:comboId`, `POST /api/combos`, `POST /api/cart/items/combo` |
| Carrito | `GET /api/cart`, `PATCH /api/cart/order-type`, `POST /api/cart/items`, `PATCH /api/cart/items/:cartId`, `DELETE /api/cart/items/:cartId` |
| Ventas | `POST /api/sales`, `GET /api/sales` |
| Caja | `GET /api/register/summary`, `POST /api/register/closures` |
| Archivos | `POST /api/uploads/products` |
| Empleados | `GET /api/employees` |
