using Microsoft.AspNetCore.Mvc;
using Model;

namespace TodoApi.Controllers;

[ApiController]
[Route("[controller]")]
public class OperationsController : ControllerBase
{
    private readonly ILogger<OperationsController> _logger;

    public OperationsController(ILogger<OperationsController> logger)
    {
        _logger = logger;
    }

    [HttpGet]
    public IActionResult Get(int base_triangulo, int altura)
    {
        OperationResult operationResult = new OperationResult();
        operationResult.Name = "area_triangulo";
        operationResult.Result = Operations.CalcularAreaTriangulo(base_triangulo,altura);
        return Ok(operationResult);

    }
}


