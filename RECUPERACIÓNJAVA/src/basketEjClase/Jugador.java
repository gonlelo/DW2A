package basketEjClase;

public class Jugador {
	double altura;
	public double porc2;
	public double porc3;
	
	public Jugador() {
		altura = 1.85;
		porc2 = 40;
		porc3 = 25;
	}

	public Jugador(double altura, double porc2, double porc3) {
		super();
		this.altura = altura;
		this.porc2 = porc2;
		this.porc3 = porc3;
	}
	
	boolean lanzar_de_tres() {
		int rand = (int) (Math.random()*100);
		System.out.print("El jugador que mide " + this.altura + "m tira un triple y...");
		if (rand <= porc3) {
			System.out.println("ACIERTAA");
			return true;
		}
		else {
			System.out.println("FALLA");
			return false;
		}
	}
	
	boolean lanzar_de_dos() {
		int rand = (int) (Math.random()*100);
		System.out.print("El jugador que mide " + this.altura + "m tira de dos y...");
		if (rand <= porc2) {
			System.out.println("ACIERTAA");
			return true;
		}
		else {
			System.out.println("FALLA");
			return false;
		}
	}
	
	void entrenar_dos() {
		int rand = (int) (Math.random()*100);
		if (rand <= 50) {
			System.out.println("Entrenamiento exitoso. La probabilidad de los tiros de 2 pasa de " + this.porc2 + " a " + (this.porc2 + 0.5));
			setPorc2(this.porc2 + 0.5);
		}
		else {
			System.out.println("El entrenamiento ha sido un fracaso.");
		}
	}
	
	void entrenar_dos(int dias) {
		int rand = (int) (Math.random()*100);
		for (int i = 1; i<=dias;i++) {
			while (porc2 != 100) {
			System.out.println("Día " + i + "/" + dias);
			if (rand <= 50) {
				System.out.print("V. La probabilidad de los tiros de 2 pasa de " + this.porc2 + " a " + this.porc2 + 0.5);
				setPorc2(this.porc2 + 0.5);
				if (this.porc2 == 100) {
					System.out.println("TIROS DE 2 PERFECCIONADOS");
				}
			}
			else {
				System.out.println("X.El entrenamiento ha sido un fracaso.");
			}
			}
		}
		System.out.println("------FIN DEL ENTRENAMIENTO MÚLTIPLE------");
	}
	
	void entrenar_tres() {
		int rand = (int) (Math.random()*100);
		if (rand <= 50) {
			System.out.println("Entrenamiento exitoso. La probabilidad de los tiros de 3 pasa de " + this.porc3 + " a " + (this.porc3 + 0.5));
			setPorc3(this.porc3 + 0.5);
		}
		else {
			System.out.println("El entrenamiento ha sido un fracaso.");
		}
	}
	
	void entrenar_tres(int dias) {
			for (int i = 1; i<=dias;i++) {
				int rand = (int) (Math.random()*100);
				if (porc3 != 100) {
					System.out.println("Día " + i + "/" + dias);
					if (rand <= 50) {
						System.out.println("V. La probabilidad de los tiros de 3 pasa de " + this.porc3 + " a " + (this.porc3 + 0.5));
						setPorc3(this.porc3 + 0.5);
						if (this.porc3 == 100) {
							System.out.println("TIROS DE 3 PERFECCIONADOS");
						}
					}
					else {
						System.out.println("X.El entrenamiento ha sido un fracaso.");
					}
				}
			}
			System.out.println("------FIN DEL ENTRENAMIENTO MÚLTIPLE------");
	}
	
	
	
// Setters y Getters
	public double getAltura() {
		return altura;
	}

	public void setAltura(double altura) {
		this.altura = altura;
	}

	public double getPorc2() {
		return porc2;
	}

	public void setPorc2(double porc2) {
		this.porc2 = porc2;
	}

	public double getPorc3() {
		return porc3;
	}

	public void setPorc3(double porc3) {
		this.porc3 = porc3;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}