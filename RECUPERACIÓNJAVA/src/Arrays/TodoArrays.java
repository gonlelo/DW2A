package Arrays;

public class TodoArrays {

    public static void main(String[] args) {

        // ** EJEMPLOS DE ARRAYS UNIDIMENSIONALES **

        // 1. Declaración simple (sin inicializar)
        int[] numeros; // Declaramos un array de enteros
        numeros = new int[5]; // Inicializamos con un tamaño de 5 (valores predeterminados: 0)
        numeros[0] = 10; // Asignamos un valor al primer índice
        numeros[1] = 20; // Asignamos un valor al segundo índice

        // 2. Declaración e inicialización con tamaño directamente
        String[] nombres = new String[3]; // Array para 3 cadenas de texto
        nombres[0] = "Juan";
        nombres[1] = "María";
        nombres[2] = "Carlos";

        // 3. Declaración e inicialización con valores específicos
        double[] decimales = {1.1, 2.2, 3.3, 4.4}; // Array con valores iniciales

        // 4. Declaración e inicialización con "new" y valores específicos
        char[] vocales = new char[]{'a', 'e', 'i', 'o', 'u'}; // Array de caracteres

        // ** ARRAYS UNIDIMENSIONALES: IMPRIMIR ELEMENTOS **
        System.out.println("Array unidimensional (numeros):");
        for (int num : numeros) { // Usamos un bucle for-each
            System.out.println(num); // Imprimimos cada número
        }

        System.out.println("\nArray unidimensional (nombres):");
        for (String nombre : nombres) {
            System.out.println(nombre);
        }

        System.out.println("\nArray unidimensional (decimales):");
        for (double decimal : decimales) {
            System.out.println(decimal);
        }

        System.out.println("\nArray unidimensional (vocales):");
        for (char vocal : vocales) {
            System.out.println(vocal);
        }

        // ** EJEMPLOS DE ARRAYS BIDIMENSIONALES **

        // 1. Declaración simple (sin inicializar)
        int[][] matriz; // Declaramos un array bidimensional
        matriz = new int[3][2]; // Inicializamos con 3 filas y 2 columnas
        matriz[0][0] = 1; // Asignamos valores específicos
        matriz[0][1] = 2;
        matriz[1][0] = 3;
        matriz[1][1] = 4;
        matriz[2][0] = 5;
        matriz[2][1] = 6;

        // 2. Declaración e inicialización con valores específicos
        String[][] frutas = {
            {"Manzana", "Plátano"},
            {"Naranja", "Pera"},
            {"Fresa", "Uva"}
        };

        // 3. Declaración y uso de un array irregular (jagged array)
        int[][] irregular = new int[3][]; // Declaramos un array de 3 filas con tamaño variable
        irregular[0] = new int[2]; // Primera fila con 2 columnas
        irregular[1] = new int[3]; // Segunda fila con 3 columnas
        irregular[2] = new int[1]; // Tercera fila con 1 columna
        irregular[0][0] = 10;
        irregular[0][1] = 20;
        irregular[1][0] = 30;
        irregular[1][1] = 40;
        irregular[1][2] = 50;
        irregular[2][0] = 60;

        // ** ARRAYS BIDIMENSIONALES: IMPRIMIR ELEMENTOS **
        System.out.println("\nArray bidimensional (matriz):");
        for (int i = 0; i < matriz.length; i++) {
            for (int j = 0; j < matriz[i].length; j++) {
                System.out.print(matriz[i][j] + " ");
            }
            System.out.println(); // Salto de línea al terminar cada fila
        }

        System.out.println("\nArray bidimensional (frutas):");
        for (int i = 0; i < frutas.length; i++) {
            for (int j = 0; j < frutas[i].length; j++) {
                System.out.print(frutas[i][j] + " ");
            }
            System.out.println(); // Salto de línea al terminar cada fila
        }

        System.out.println("\nArray irregular (irregular):");
        for (int i = 0; i < irregular.length; i++) {
            for (int j = 0; j < irregular[i].length; j++) {
                System.out.print(irregular[i][j] + " ");
            }
            System.out.println(); // Salto de línea al terminar cada fila
        }
    }
}
