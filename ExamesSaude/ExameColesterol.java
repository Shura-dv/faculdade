package main.java.Exames;

import java.util.Scanner;

public class ExameColesterol extends Exame {
    private double quantidadeLDL;
    private double quantidadeHDL;
    private char risco;

    public ExameColesterol(String nome, String tipoSanguineo, int anoNascimento) {
        super(nome, tipoSanguineo, anoNascimento);
    }

    @Override
    public void calcularResultado() {
        String riscoHDL = calcularRiscoHDL();
        String riscoLDL = calcularRiscoLDL();
        
        resultado = "Risco HDL: " + riscoHDL + ", Risco LDL: " + riscoLDL;
    }

    private String calcularRiscoHDL() {
        if (anoNascimento <= 19) {
            if (quantidadeHDL > 45) {
                return "BOM";
            } else {
                return "RUIM";
            }
        } else {
            if (quantidadeHDL > 40) {
                return "BOM";
            } else {
                return "RUIM";
            }
        }
    }

    private String calcularRiscoLDL() {
        if (risco == 'B') {
            if (quantidadeLDL < 100) {
                return "BAIXO";
            } else {
                return "ALTO";
            }
        } else if (risco == 'M') {
            if (quantidadeLDL < 70) {
                return "BAIXO";
            } else {
                return "ALTO";
            }
        } else { // risco == 'A'
            if (quantidadeLDL < 50) {
                return "BAIXO";
            } else {
                return "ALTO";
            }
        }
    }

    @Override
    public void mostrarResultado() {
        System.out.println("Resultado do Exame de Colesterol:");
        super.mostrarResultado();
        System.out.println();
    }

    @Override
    public void cadastrarExame(Scanner scanner) {
        System.out.print("Informe a quantidade de HDL em mg/dL: ");
        quantidadeHDL = scanner.nextDouble();
        System.out.print("Informe a quantidade de LDL em mg/dL: ");
        quantidadeLDL = scanner.nextDouble();
        calcularResultado();
        scanner.nextLine();
    }
}
