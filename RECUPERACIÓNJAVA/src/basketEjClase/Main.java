package basketEjClase;

public class Main {

	public static void main(String[] args) {
		Jugador jugador1 = new Jugador();
		Jugador jugador2 = new Jugador(1.9, 40, 15);
		int cont = 0;
		
		jugador1.entrenar_tres(10);
		jugador2.entrenar_tres(10);
		
		while (jugador1.porc2 < 65) {
			jugador1.entrenar_dos();
		}
		while (jugador1.porc3 < 45) {
			jugador1.entrenar_tres();
		}
	
		while (jugador2.porc2 < 65) {
			jugador2.entrenar_dos();
		}
		while (jugador2.porc3 < 45) {
			jugador2.entrenar_tres();
		}
		
		while (cont < 10) {
		if	(jugador1.lanzar_de_dos()) {
			cont++;
		}
		}
		cont= 0;
		while (cont < 4) {
		if	(jugador1.lanzar_de_tres()) {
			cont++;
		}
		}
		cont= 0;
		
		while (cont < 10) {
		if	(jugador2.lanzar_de_dos()) {
			cont++;
		}
		}
		cont= 0;
		
		while (cont < 4) {
		if	(jugador1.lanzar_de_tres()) {
			cont++;
		}
		}
		cont= 0;
		
		System.out.println("HECHO!");
}

}
