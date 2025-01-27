package MenuCalculoFechas;

	import java.util.Scanner;

	public class Sesion3 {
	    public static void main(String[] args) {
	        Sesion3.ejecutarPrograma();
	    }

	    public static int menu() {
	        Scanner teclado = new Scanner(System.in);
	        System.out.println("Opciones del programa: \n " +
	                "1. Calcular el número de días de un año hasta el comienzo de un mes determinado. \n" +
	                "2. Calcular el día de la semana asociado a una fecha. \n" +
	                "3. Mostrar todos los domingos del mes. \n" +
	                "4. Calcular la siguiente fecha, a partir de 2022, que coincida en día de la semana con la fecha dada. \n" +
	                "5. Calcular la distancia, en días, entre dos fechas de un año no bisiesto. \n" +
	                "0. Finalizar la ejecución del programa. \n");
	        System.out.print("Introduzca el número correspondiente a la opción que se desee ejecutar: ");
	        return leerNumero(0, 5);
	    }

	    public static void ejecutarPrograma() {
	        int dia, mes, año, diaSemana;
	        boolean fecha;
	        switch (menu()) {
	            case 0:
	                System.out.println("Fin de la ejecución. Adiós.");
	                break;
	            case 1:
	                mes = Sesion3.leerNumero(1, 12);
	                System.out.println("En un año no bisiesto han pasado " + Sesion3.getDiasTranscurridosHasta(mes) + " días desde el comienzo del mes " + mes + ".");
	                break;
	            case 2:
	                dia = leerNumero(1, 31);
	                mes = leerNumero(1, 12);
	                año = leerNumero(1900, 2100);
	                fecha = Sesion3.esFechaCorrecta(dia, mes, año);
	                if (fecha = true) {
	                    diaSemana = Sesion3.getDiaDeLaSemana(dia, mes, año);
	                    String resultado = "";
	                    switch (diaSemana) {
	                        case 0:
	                            resultado = "domingo";
	                            break;
	                        case 1:
	                            resultado = "lunes";
	                            break;
	                        case 2:
	                            resultado = "martes";
	                            break;
	                        case 3:
	                            resultado = "miércoles";
	                            break;
	                        case 4:
	                            resultado = "jueves";
	                            break;
	                        case 5:
	                            resultado = "viernes";
	                            break;
	                        case 6:
	                            resultado = "sábado";
	                            break;
	                    }
	                    System.out.println("El " + dia + "/" + mes + "/" + año + " es " + resultado + ".");
	                } else {
	                    System.out.println("El " + dia + "/" + mes + "/" + año + "no existe.");
	                }
	                break;
	            case 3:
	                mes = Sesion3.leerNumero(1, 12);
	                System.out.println(Sesion3.getDiasTranscurridosHasta(mes));
	        }
	    }


	    public static int leerNumero(int n1, int n2) {
	        Scanner teclado = new Scanner(System.in);
	        int numero;
	        System.out.print("Introduce un número entre " + n1 + " y " + n2 + ": ");
	        numero = teclado.nextInt();
	        while (n1 > numero || n2 < numero) {
	            System.out.println("El número introducido es incorrecto");
	            System.out.print("Introduce un número entre " + n1 + " y " + n2 + ": ");
	            numero = teclado.nextInt();
	        }
	        return numero;
	    }

	    public static boolean esFechaCorrecta(int dia, int mes, int año) {
	        boolean fecha = false;
	        switch (mes) {
	            case 1, 3, 5, 7, 8, 10, 12:
	                fecha = true;
	                break;
	            case 4, 6, 9, 11:
	                fecha = dia != 31;
	                break;
	            case 2:
	                if (año % 4 == 0) {
	                    fecha = dia <= 29;
	                } else {
	                    fecha = dia <= 28;
	                }
	                break;
	        }
	        return fecha;
	    }

	    public static int getDiasDeMes(int n) {
	        int diasDeMes = 0;
	        switch (n) {
	            case 1, 3, 5, 7, 8, 10, 12:
	                diasDeMes = 31;
	                break;
	            case 4, 6, 9, 11:
	                diasDeMes = 30;
	                break;
	            case 2:
	                diasDeMes = 28;
	                break;
	        }
	        return diasDeMes;
	    }

	    public static int getDiasTranscurridosHasta(int mes) {
	        int diasTranscurridosHasta = 0;
	        for (int i = 0; mes > i; i++) {
	            diasTranscurridosHasta += Sesion3.getDiasDeMes(i);
	        }
	        return diasTranscurridosHasta;
	    }

	    public static int getDiaDeLaSemana(int dia, int mes, int año) {
	        int dias;
	        String diaDeLaSemana;
	        dias = ((año - 1900) * 365) + ((año - 1900) / 4);
	        if (año % 4 == 0 && (mes == 1 || mes == 2)) {
	            dias -= 1;
	        }
	        dias += Sesion3.getDiasTranscurridosHasta(mes) + dia;
	        dias %= 7;
	        return dias;
	    }
	}